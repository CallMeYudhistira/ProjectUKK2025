<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Period;
use App\Models\Submission;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function vehicle()
    {
        $periods = Period::all();
        $vehicles = Vehicle::simplePaginate(6);

        return view('users.transaction.vehicle', compact('vehicles', 'periods'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        if (!$keyword) {
            return redirect('/nasabah/transaksi/kendaraan');
        }

        $periods = Period::all();
        $vehicles = Vehicle::where('vehicle_name', 'LIKE', "%$keyword%")->simplePaginate(6);

        return view('users.transaction.vehicle', compact('vehicles', 'periods', 'keyword'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'period_id' => 'required',
            'total_price' => 'required',
            'monthly_installments' => 'required',
            'identity_card' => 'required',
        ]);

        $pict = $request->file('identity_card');
        $cardLocation = 'user_id-' . Auth::user()->id . '_' . now()->format('d-m-Y') . '_' . time() . '.' . $pict->getClientOriginalExtension();
        $pict->move(public_path('images/ID'), $cardLocation);

        Submission::create([
            'user_id' => Auth::user()->id,
            'vehicle_id' => $id,
            'period_id' => $request->period_id,
            'submission_date' => now(),
            'total_price' => $request->total_price,
            'monthly_installments' => $request->monthly_installments,
            'identity_card' => $cardLocation,
            'status' => 'diajukan',
        ]);

        return redirect()->back()->with('success', 'Cicilan Berhasil Diajukan!');
    }

    public function instalment(Request $request)
    {
        $status = $request->status ? $request->status : 'semua';
        $tanggal = $request->tanggal;

        if (Auth::user()->role == 'admin') {
            $instalments = DB::table("submission_list");
            if ($status != 'semua') {
                $instalments = $instalments->where('status_bayar', $status);
            }
            if ($tanggal) {
                $instalments = $instalments->where('tgl_pengajuan', $tanggal);
            }
            $instalments = $instalments->simplePaginate(15);

            return view('admin.transaction.instalment', compact('instalments', 'status', 'tanggal'));
        } else {
            $instalments = DB::table("submission_list")->where('user_id', Auth::user()->id);
            if ($status != 'semua') {
                $instalments = $instalments->where('status_bayar', $status);
            }
            if ($tanggal) {
                $instalments = $instalments->where('tgl_pengajuan', $tanggal);
            }
            $instalments = $instalments->simplePaginate(15);

            return view('users.transaction.instalment', compact('instalments', 'status', 'tanggal'));
        }
    }

    public function detail($id)
    {
        if (Auth::user()->role == 'admin') {
            $instalment = DB::table("submission_list")->where('submission_id', $id)->latest()->first();
            $payments = Payment::where('submission_id', $id)->get();

            $month_query = Payment::where('submission_id', $id)->whereMonth('payment_date', now()->format('m'))->get();
            $month_check = false;

            if (count($month_query) > 0) {
                $month_check = true;
            }

            $paid_off_check = count($payments) == Submission::with('period')->find($id)->period->time_period;

            return view('admin.transaction.detail', compact('instalment', 'payments', 'month_check', 'paid_off_check'));
        } else {
            $instalment = DB::table("submission_list")->where('user_id', Auth::user()->id)->where('submission_id', $id)->latest()->first();
            $payments = Payment::where('submission_id', $id)->get();

            $paid_off_check = count($payments) == Submission::with('period')->find($id)->period->time_period;
            return view('users.transaction.detail', compact('instalment', 'payments', 'paid_off_check'));
        }
    }

    public function editStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        Submission::find($id)->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status berhasil ' . $request->status);
    }

    public function pay(Request $request, $id)
    {
        $request->validate([
            'monthly_installments' => 'required',
            'total_price' => 'required',
        ]);

        Payment::create([
            'submission_id' => $id,
            'payment_date' => now(),
            'amount_of_paid' => $request->monthly_installments,
            'remaining_debt' => $request->total_price - $request->monthly_installments <= 0 ? 0 : $request->total_price - $request->monthly_installments,
            'status' => $request->total_price - $request->monthly_installments <= 0 ? 'lunas' : 'belum lunas',
            'note' => $request->note,
        ]);

        return redirect()->back()->with('success', 'Pembayaran berhasil!');
    }
}
