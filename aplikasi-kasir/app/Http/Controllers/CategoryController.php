<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::simplePaginate(10);
        return view('categories.index', compact('categories'));
    }

    public function search(Request $request){
        $keyword = $request->keyword;
        if(!$keyword){
            return redirect('/kategori');
        }
        $categories = Category::where('category_name', 'LIKE', '%' . $keyword . '%')->simplePaginate(10);
        return view('categories.index', compact('categories', 'keyword'));
    }

    public function create(Request $request){
        Category::create($request->validate([
            'category_name' => 'required',
        ]));
        return redirect('/kategori')->with('success', 'Tambah Data Berhasil!');
    }

    public function update(Request $request, $id){
        Category::find($id)->update($request->validate([
            'category_name' => 'required',
        ]));
        return redirect('/kategori')->with('success', 'Ubah Data Berhasil!');
    }

    public function delete($id){
        Category::find($id)->delete();
        return redirect('/kategori')->with('success', 'Hapus Data Berhasil!');
    }
}
