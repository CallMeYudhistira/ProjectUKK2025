<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $now = Carbon::now();

        // SUMMARY
        $totalStudents = Student::count();

        $paidThisMonth = Payment::where('month_paid', $now->month)
            ->distinct('nis')
            ->count('nis');

        $unpaidStudents = $totalStudents - $paidThisMonth;

        $totalIncomeThisMonth = Payment::whereMonth('payment_date', $now->month)
            ->whereYear('payment_date', $now->year)
            ->sum('total');

        // TRANSAKSI TERAKHIR
        $latestPayments = Payment::with('student')
            ->orderBy('payment_date', 'desc')
            ->limit(5)
            ->get();

        // DATA CHART (per bulan)
        $chartData = Payment::selectRaw('MONTH(payment_date) as month, SUM(total) as total')
            ->whereYear('payment_date', $now->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = [];
        $totals = [];

        foreach ($chartData as $data) {
            $months[] = Carbon::create()->month($data->month)->format('F');
            $totals[] = $data->total;
        }

        return view('pages.index', compact(
            'totalStudents',
            'paidThisMonth',
            'unpaidStudents',
            'totalIncomeThisMonth',
            'latestPayments',
            'months',
            'totals',
        ));
    }
}
