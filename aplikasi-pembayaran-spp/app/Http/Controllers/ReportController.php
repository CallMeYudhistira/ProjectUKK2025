<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Month;
use App\Models\Payment;
use App\Models\Student;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $grade_id = $request->grade_id;

        $students = Student::query();
        if ($grade_id) {
            $students->where('grade_id', '=', "$grade_id");
        }
        $students = $students->with('grade', 'fee')->get();
        $payments = Payment::all();
        $grades = Grade::all();
        $months = Month::all();

        return view('pages.reports.index', compact('students', 'grade_id', 'payments', 'grades', 'months'));
    }

    public function print(Request $request) {
        $grade_id = $request->grade_id;

        if (!$grade_id) {
            return redirect()->back()->with('error', 'Pilih kelas terlebih dahulu!');
        }

        $students = Student::with('grade', 'fee')->where('grade_id', '=', "$grade_id")->get();
        $payments = Payment::all();
        $grade = Grade::find($grade_id);
        $totalAll = 0;
        $debtAll = 0;
        $admin = User::where('role', 'admin')->orderBy('created_at', 'asc')->first()->name;
        $months = Month::all();

        $pdf = Pdf::loadView('pages.reports.print', compact('admin', 'debtAll', 'grade', 'payments', 'students', 'totalAll', 'months'))->setPaper('a3', 'landscape');
        return $pdf->stream('laporan_kelas.pdf');
    }
}
