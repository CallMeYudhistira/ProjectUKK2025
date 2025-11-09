<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::join('units', 'units.unit_id', '=', 'products.unit_id')->join('categories', 'categories.category_id', '=', 'products.category_id')->simplePaginate(10);
        $categories = Category::all();
        $units = Unit::all();
        return view('products.index', compact('products', 'units', 'categories'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        if (!$keyword) {
            return redirect('/produk');
        }
        $products = Product::join('units', 'units.unit_id', '=', 'products.unit_id')->join('categories', 'categories.category_id', '=', 'products.category_id')->where('product_name', 'LIKE', '%' . $keyword . '%')->simplePaginate(10);
        $categories = Category::all();
        $units = Unit::all();
        return view('products.index', compact('products', 'units', 'categories', 'keyword'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'pict' => 'max:2048',
            'category_id' => 'required',
            'unit_id' => 'required',
            'purchase_price' => 'required|min:1',
            'selling_price' => 'required|min:1',
            'stock' => 'required|min:1',
        ]);

        $pictName = null;

        if ($request->hasFile('pict')) {
            $pict = $request->file('pict');
            $pictName = now()->format('d-m-Y') . '_' . $pict->hashName();
            $pict->move(public_path('images'), $pictName);
        }

        Product::create([
            'product_name' => $request->product_name,
            'pict' => $pictName,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'stock' => $request->stock,
        ]);

        return redirect('/produk')->with('success', 'Tambah Data Berhasil!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required',
            'pict' => 'max:2048',
            'category_id' => 'required',
            'unit_id' => 'required',
            'purchase_price' => 'required|min:1',
            'selling_price' => 'required|min:1',
            'stock' => 'required|min:1',
        ]);

        $product = Product::find($id);
        $pictName = $product->pict;

        if ($request->hasFile('pict')) {
            if ($pictName) {
                unlink(public_path('images/' . $pictName));
            }
            $pict = $request->file('pict');
            $pictName = now()->format('d-m-Y') . '_' . $pict->hashName();
            $pict->move(public_path('images'), $pictName);
        }

        $product->update([
            'product_name' => $request->product_name,
            'pict' => $pictName,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'stock' => $request->stock,
        ]);

        return redirect('/produk')->with('success', 'Ubah Data Berhasil!');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $pictName = $product->pict;
        unlink(public_path('images/' . $pictName));
        $product->delete();
        return redirect('/produk')->with('success', 'Hapus Data Berhasil!');
    }
}
