<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function index(){
        $periods = Period::simplePaginate(10);
        return view('admin.periods.index', compact('periods'));
    }

    public function create(Request $request){
        Period::create($request->validate([
            'time_period' => 'required',
            'interest' => 'required',
        ]));
        return redirect('/admin/periode')->with('success', 'Tambah Data Berhasil!');
    }

    public function update(Request $request, $id){
        Period::find($id)->update($request->validate([
            'time_period' => 'required',
            'interest' => 'required',
        ]));
        return redirect('/admin/periode')->with('success', 'Ubah Data Berhasil!');
    }

    public function delete($id){
        Period::find($id)->delete();
        return redirect('/admin/periode')->with('success', 'Hapus Data Berhasil!');
    }
}
