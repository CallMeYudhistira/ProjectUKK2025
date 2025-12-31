<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $products = Product::query();
        if ($keyword) {
            $products->where('name', 'like', "%$keyword%");
        }
        $products = $products->simplePaginate(10);

        return view('admin.products.index', compact('products', 'keyword'));
    }

    public function store(Request $request)
    {
        $product = Product::create($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]));

        if ($request->hasFile('pict')) {
            $pict = $request->file('pict');
            $fileName = now()->format('d-m-Y_') . $pict->hashName();
            $pict->move(public_path('image/product'), $fileName);
            $product->pict = $fileName;
            $product->save();
        }

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->update($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]));

        if ($request->hasFile('pict')) {
            if (file_exists(public_path('image/product/' . $product->pict)) && $product->pict != null) {
                unlink(public_path('image/product/' . $product->pict));
            }

            $pict = $request->file('pict');
            $fileName = now()->format('d-m-Y_') . $pict->hashName();
            $pict->move(public_path('image/product'), $fileName);
            $product->pict = $fileName;
            $product->save();
        }

        return redirect()->back()->with('success', 'Ubah Data Berhasil!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (file_exists(public_path('image/product/' . $product->pict)) && $product->pict != null) {
            unlink(public_path('image/product/' . $product->pict));
        }
        Product::destroy($id);

        return redirect()->back()->with('success', 'Hapus Data Berhasil!');
    }
}
