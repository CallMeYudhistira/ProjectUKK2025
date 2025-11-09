<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke()
    {
        $omset = collect(DB::select("SELECT * FROM laporan WHERE date = '" . now()->format('Y-m-d') . "'"))->sum('omset');
        $laba = collect(DB::select("SELECT * FROM laporan WHERE date = '" . now()->format('Y-m-d') . "'"))->sum('laba');
        $transaksi = collect(DB::select("SELECT * FROM laporan WHERE date = '" . now()->format('Y-m-d') . "'"))->count();
        $stok = collect(DB::select('SELECT * FROM products WHERE stock < 10'))->count();

        #Data (Chart) Per Bulan
        $bulan = date('m');
        $tahun = date('Y');
        $modalBulan = [];
        $omsetBulan = [];
        $labaBulan = [];
        $dataBulan = [];
        for ($i = 1; $i <= 12; $i++) {
            $record = collect(DB::select("SELECT laba, omset, modal, MONTH(date) AS bulan FROM laporan WHERE MONTH(date) = '$i'"))->first();

            if (!$record) {
                $modalBulan[] = 0;
                $omsetBulan[] = 0;
                $labaBulan[] = 0;
            } else {
                $modalBulan[] = $record->modal;
                $omsetBulan[] = $record->omset;
                $labaBulan[] = $record->laba;
            }
            $dataBulan[] = Carbon::parse('01-' . $i . '-2000')->translatedFormat('F');
        }

        return view('auth.home', compact('omset', 'laba', 'transaksi', 'stok', 'dataBulan', 'modalBulan', 'labaBulan', 'omsetBulan'));
    }
}
