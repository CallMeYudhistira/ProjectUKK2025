<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Month;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;

class CardController extends Controller
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
        $payments = Payment::all();

        return view('pages.cards.index', compact('students', 'keyword', 'grade_id', 'grades', 'payments'));
    }

    public function print($nis){
        $payments = Payment::with('user')->where('nis', $nis)->get();
        $student = Student::with('grade', 'fee')->find($nis);
        $months = Month::all();

        return view('pages.cards.print', compact('payments', 'student', 'months'));
    }
}
