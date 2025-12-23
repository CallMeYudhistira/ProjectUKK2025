<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request){
        $status = $request->status ? $request->status : 'semua';
        $dari = $request->dari;
        $sampai = $request->sampai;

        if (Auth::user()->role == 'admin') {
            $instalments = DB::table("submission_list");
            if ($status != 'semua') {
                $instalments = $instalments->where('status_bayar', $status);
            }
            if ($dari && $sampai) {
                $instalments = $instalments->whereBetween('tgl_pengajuan', [$dari, $sampai]);
            }
            $instalments = $instalments->get();

            return view('admin.reports.index', compact('instalments', 'status', 'dari', 'sampai'));
        }
    }

    public function print(Request $request){
        $status = $request->status ? $request->status : 'semua';
        $dari = $request->dari;
        $sampai = $request->sampai;

        if(!$dari || !$sampai){
            return redirect()->back()->with('error', 'Tanggal harus diisi untuk mencetak laporan.');
        }

        if (Auth::user()->role == 'admin') {
            $instalments = DB::table("submission_list");
            if ($status != 'semua') {
                $instalments = $instalments->where('status_bayar', $status);
            }
            if ($dari && $sampai) {
                $instalments = $instalments->whereBetween('tgl_pengajuan', [$dari, $sampai]);
            }
            $instalments = $instalments->get();

            $pdf = Pdf::loadView('admin.reports.print', compact('instalments', 'dari', 'sampai', 'status'))->setPaper('a4', 'landscape');
            return $pdf->stream('laporan-cicilan_' . Carbon::parse($dari)->translatedFormat('d-M-Y') . '_-_' . Carbon::parse($sampai)->translatedFormat('d-M-Y') . '.pdf');
        }
    }
}
