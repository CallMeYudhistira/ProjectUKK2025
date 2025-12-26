<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Fee;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use Nette\Utils\Random;

class StudentController extends Controller
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
        $fees = Fee::all();
        $generatedNis = $this->generateNIS();

        return view('pages.students.index', compact('students', 'keyword', 'grade_id', 'generatedNis', 'grades', 'fees'));
    }

    public function store(Request $request)
    {
        $student = Student::create($request->validate([
            'nis' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone_number' => 'required|string|max:15',
            'grade_id' => 'required|integer',
            'fee_id' => 'required|integer',
        ]));

        return redirect()->back()->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function update(Request $request, string $id)
    {
        Student::find($id)->update($request->validate([
            'nis' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone_number' => 'required|string|max:15',
            'grade_id' => 'required|integer',
            'fee_id' => 'required|integer',
        ]));
        return redirect()->back()->with('success', 'Siswa berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        Student::destroy($id);
        return redirect()->back()->with('success', 'Siswa berhasil dihapus.');
    }

    private function generateNIS(){
        $nis = '10' . Random::generate(6, '0-9');
        if (Student::where('nis', $nis)->exists()) {
            return $this->generateNIS();
        }
        return $nis;
    }
}
