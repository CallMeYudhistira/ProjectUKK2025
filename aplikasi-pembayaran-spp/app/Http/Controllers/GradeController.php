<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $grades = Grade::query();
        if ($keyword) {
            $grades->where('name', 'like', "%$keyword%");
        }
        $grades = $grades->simplePaginate(10);

        return view('pages.grades.index', compact('grades', 'keyword'));
    }

    public function store(Request $request)
    {
        Grade::create($request->validate([
            'name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
        ]));
        return redirect()->back()->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function update(Request $request, string $id)
    {
        Grade::find($id)->update($request->validate([
            'name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
        ]));
        return redirect()->back()->with('success', 'Kelas berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        Grade::destroy($id);
        return redirect()->back()->with('success', 'Kelas berhasil dihapus.');
    }
}
