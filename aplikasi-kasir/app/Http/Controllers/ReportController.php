<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $data = DB::select('SELECT * FROM laporan ORDER BY transaction_id DESC');
        $transactions = new Paginator($data, 10);
    
        return view('report.index', compact('transactions'));
    }

    public function filter(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;

        if (!$dari && !$sampai) {
            return redirect('/laporan');
        }

        $data = DB::select("SELECT * FROM laporan WHERE date BETWEEN '$dari' AND '$sampai' ORDER BY transaction_id DESC");
        $transactions = new Paginator($data, 10);

        return view('report.index', compact('transactions', 'dari', 'sampai'));
    }

    public function detail($id)
    {
        $transaction = Transaction::join('users', 'users.id', '=', 'transactions.user_id')->where('transactions.transaction_id', $id)->first();
        $transaction_details = Transaction::join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.transaction_id')->join('products', 'products.product_id', '=', 'transaction_details.product_id')->join('units', 'units.unit_id', '=', 'products.unit_id')->where('transactions.transaction_id', $id)->get(['products.product_name', 'transaction_details.selling_price', 'transaction_details.quantity', 'transaction_details.subtotal', 'units.unit_name']);

        $pdf = Pdf::loadView('report.detail', compact('transaction', 'transaction_details'))->setPaper('a5', 'portrait');
        return $pdf->stream('invoice-' . $transaction->transaction_id . '-' . date_create($transaction->date)->format('d m Y') . '.pdf');
    }

    public function exportExcel(Request $request)
    {
        $fileName = 'rekap_transaksi_' . date('Y-m-d_H-i-s') . '.xls';
        $dari = $request->dari;
        $sampai = $request->sampai;

        if (!$dari && !$sampai) {
            $transactions = DB::select('SELECT * FROM laporan ORDER BY transaction_id ASC');
        } else {
            $transactions = DB::select("SELECT * FROM laporan WHERE date BETWEEN '$dari' AND '$sampai' ORDER BY transaction_id ASC");
        }

        $headers = [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ];

        $callback = function () use ($transactions) {
            echo "<table border='1'>";
            echo "<tr>
                <th>Tanggal</th>
                <th>Modal</th>
                <th>Laba</th>
                <th>Total</th>
                <th>Bayar</th>
                <th>Kembali</th>
                <th>Nama Kasir</th>
            </tr>";
            foreach ($transactions as $t) {
                echo "<tr>
                    <td>" . Carbon::parse($t->date)->isoFormat('DD/MMM/Y') . "</td>
                    <td>{$t->modal}</td>
                    <td>{$t->laba}</td>
                    <td>{$t->total}</td>
                    <td>{$t->paid}</td>
                    <td>{$t->kembali}</td>
                    <td>" . ($t->name ?? '-') . "</td>
                </tr>";
            }
            echo "</table>";
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportPDF(Request $request){
        $dari = $request->dari;
        $sampai = $request->sampai;

        if (!$dari && !$sampai) {
            $dari = Transaction::first()->date;
            $sampai = Transaction::latest()->first()->date;
            $transactions = collect(DB::select('SELECT * FROM laporan ORDER BY transaction_id ASC'));
        } else {
            $transactions = collect(DB::select("SELECT * FROM laporan WHERE date BETWEEN '$dari' AND '$sampai' ORDER BY transaction_id ASC"));
        }

        $pdf = Pdf::loadView('report.recap', compact('transactions', 'dari', 'sampai'))->setPaper('a5', 'portrait');
        return $pdf->stream('laporan-penjualan_' . Carbon::parse($dari)->translatedFormat('d-M-Y') . '_-_' . Carbon::parse($sampai)->translatedFormat('d-M-Y') . '.pdf');
    }
}
