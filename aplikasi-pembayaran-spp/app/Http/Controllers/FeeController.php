<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $fees = Fee::query();
        if ($keyword) {
            $fees->where('year', '=', "$keyword");
        }
        $fees = $fees->simplePaginate(10);

        return view('pages.fees.index', compact('fees', 'keyword'));
    }

    public function store(Request $request)
    {
        Fee::create($request->validate([
            'year' => 'required|string|max:4',
            'amount' => 'required|integer',
        ]));
        return redirect()->back()->with('success', 'SPP berhasil ditambahkan.');
    }

    public function update(Request $request, string $id)
    {
        Fee::find($id)->update($request->validate([
            'year' => 'required|string|max:4',
            'amount' => 'required|integer',
        ]));
        return redirect()->back()->with('success', 'SPP berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        Fee::destroy($id);
        return redirect()->back()->with('success', 'SPP berhasil dihapus.');
    }
}
