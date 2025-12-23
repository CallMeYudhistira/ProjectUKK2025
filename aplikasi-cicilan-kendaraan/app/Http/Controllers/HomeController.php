<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function admin()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        /* =======================
           SUMMARY CARD
        ======================= */

        $totalPengajuan = DB::table('submission_list')->count();

        $totalKredit = DB::table('submission_list')->sum('total');

        $totalSisa = DB::table('submission_list')->sum('sisa');

        $totalLunas = DB::table('submission_list')
            ->where('status_bayar', 'LUNAS')
            ->count();

        $totalBelumLunas = DB::table('submission_list')
            ->where('status_bayar', 'BELUM')
            ->count();

        $totalBayar = DB::table('submission_list')->sum('total_bayar');

        /* =======================
           GRAFIK PEMBAYARAN BULANAN
        ======================= */

        $payments = DB::table('payments')
            ->selectRaw('MONTH(payment_date) as bulan, SUM(amount_of_paid) as total')
            ->whereYear('payment_date', date('Y'))
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $bulan = [];
        $totalPembayaran = [];

        foreach ($payments as $p) {
            $bulan[] = Carbon::create()->month($p->bulan)->translatedFormat('F');
            $totalPembayaran[] = $p->total;
        }

        /* =======================
           TABEL CICILAN BERMASALAH
        ======================= */

        $tunggakan = DB::table('submission_list')
            ->where('status_bayar', 'BELUM')
            ->orderByDesc('sisa')
            ->limit(5)
            ->get();

        return view('admin.index', compact(
            'totalPengajuan',
            'totalKredit',
            'totalSisa',
            'totalLunas',
            'totalBelumLunas',
            'totalBayar',
            'bulan',
            'totalPembayaran',
            'tunggakan'
        ));
    }

    public function nasabah()
    {
        $userId = Auth::id();

        // Ambil cicilan aktif user
        $cicilan = DB::table('submission_list')
            ->where('user_id', $userId)
            ->orderByDesc('created_at')
            ->first();

        // Kalau user belum punya cicilan
        if (!$cicilan) {
            return view('users.index', [
                'cicilan' => null
            ]);
        }

        // Progress cicilan (%)
        $progress = round(
            ($cicilan->periode_terbayar / $cicilan->waktu) * 100,
            2
        );

        // Riwayat pembayaran
        $riwayat = DB::table('payments')
            ->where('submission_id', $cicilan->submission_id)
            ->orderBy('created_at')
            ->get();

        return view('users.index', compact(
            'cicilan',
            'progress',
            'riwayat'
        ));
    }
}
