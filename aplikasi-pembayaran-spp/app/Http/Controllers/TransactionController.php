<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Grade;
use App\Models\Month;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $grade_id = $request->grade_id;

        $students = Student::query();
        if ($keyword) {
            $students->where('name', 'like', "%$keyword%");
        }
        if ($grade_id) {
            $students->where('grade_id', '=', "$grade_id");
        }
        $students = $students->with('grade', 'fee')->simplePaginate(10);
        $grades = Grade::all();
        $months = Month::all();
        $payments = Payment::all();

        return view('pages.payments.index', compact('students', 'keyword', 'grade_id', 'grades', 'months', 'payments'));
    }

    public function payment($nis)
    {
        $student = Student::with('grade', 'fee')->find($nis);
        $months = Month::all();
        $payments = Payment::all();

        return view('pages.payments.payment', compact('months', 'payments', 'student'));
    }

    public function pay(Request $request, $nis)
    {
        $request->validate([
            'total' => 'required|integer',
            'months_paid' => 'required|integer|min:1'
        ]);

        $months_paid = $request->months_paid;

        $paidMonths = Payment::where('nis', $nis)->pluck('month_paid')->toArray();

        $months = Month::all();

        foreach ($months as $month) {
            if (in_array($month->number, $paidMonths)) {
                continue;
            }

            if (now()->month > 6) {
                $year = $month->number > 6 ? now()->year : now()->year + 1;
            } else {
                $year = $month->number > 6 ? now()->year - 1 : now()->year;
            }

            Payment::create([
                'nis' => $nis,
                'user_id' => Auth::id(),
                'payment_date' => now(),
                'month_paid' => $month->number,
                'year_paid' => $year,
                'total' => $request->total / $request->months_paid,
            ]);

            $months_paid--;

            if ($months_paid === 0) {
                break;
            }
        }

        return redirect('/transaksi')->with('success', 'Pembayaran Berhasil!');
    }
}
