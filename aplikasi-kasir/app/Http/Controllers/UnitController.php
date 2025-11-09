<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(){
        $units = Unit::simplePaginate(10);
        return view('units.index', compact('units'));
    }

    public function search(Request $request){
        $keyword = $request->keyword;
        if(!$keyword){
            return redirect('/satuan');
        }
        $units = Unit::where('unit_name', 'LIKE', '%' . $keyword . '%')->simplePaginate(10);
        return view('units.index', compact('units', 'keyword'));
    }

    public function create(Request $request){
        Unit::create($request->validate([
            'unit_name' => 'required',
        ]));
        return redirect('/satuan')->with('success', 'Tambah Data Berhasil!');
    }

    public function update(Request $request, $id){
        Unit::find($id)->update($request->validate([
            'unit_name' => 'required',
        ]));
        return redirect('/satuan')->with('success', 'Ubah Data Berhasil!');
    }

    public function delete($id){
        Unit::find($id)->delete();
        return redirect('/satuan')->with('success', 'Hapus Data Berhasil!');
    }
}
