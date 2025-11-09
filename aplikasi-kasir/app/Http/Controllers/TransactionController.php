<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        try {
            $orderNo = Transaction::latest()->first()->transaction_id;
        } catch (Exception $e) {
            $orderNo = 1;
        }

        $products = Product::join('units', 'units.unit_id', '=', 'products.unit_id')->join('categories', 'categories.category_id', '=', 'products.category_id')->simplePaginate(8);
        $carts = Cart::join('products', 'products.product_id', '=', 'carts.product_id')->join('units', 'units.unit_id', '=', 'products.unit_id')->where('carts.user_id', Auth::user()->id)->get();
        return view('transactions.index', compact('orderNo', 'products', 'carts'));
    }

    public function search(Request $request)
    {
        try {
            $orderNo = Transaction::latest()->first()->transaction_id;
        } catch (Exception $e) {
            $orderNo = 1;
        }

        $keyword = $request->keyword;
        if (!$keyword) {
            return redirect('/transaksi');
        }

        $products = Product::join('units', 'units.unit_id', '=', 'products.unit_id')->join('categories', 'categories.category_id', '=', 'products.category_id')->where('product_name', 'LIKE', '%' . $keyword . '%')->simplePaginate(8);
        $carts = Cart::join('products', 'products.product_id', '=', 'carts.product_id')->join('units', 'units.unit_id', '=', 'products.unit_id')->where('carts.user_id', Auth::user()->id)->get();
        return view('transactions.index', compact('orderNo', 'products', 'carts', 'keyword'));
    }

    public function store(Request $request){
        $request->validate([
            'total' => 'required',
            'paid' => 'required',
            'change' => 'required',
        ]);

        if($request->total <= 0){
            return redirect()->back()->with('error', 'Keranjang Masih Kosong!');
        }

        if($request->paid - $request->total < 0){
            return redirect()->back()->with('error', 'Uang Anda Kurang!');
        }

        Transaction::create([
            'date' => now(),
            'total' => $request->total,
            'paid' => $request->paid,
            'change' => $request->change,
            'user_id' => Auth::user()->id,
        ]);

        $transaction_id = Transaction::latest()->first()->transaction_id;
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        foreach ($carts as $cart) {
            TransactionDetail::create([
                'transaction_id' => $transaction_id,
                'product_id' => $cart->product_id,
                'purchase_price' => $cart->purchase_price,
                'selling_price' => $cart->selling_price,
                'quantity' => $cart->quantity,
                'subtotal' => $cart->subtotal,
            ]);

            $product = Product::find($cart->product_id);
            $product->update([
                'stock' => $product->stock - $cart->quantity,
            ]);

            $cart->delete();
        }

        return redirect('/transaksi')->with('success', 'Transaksi Berhasil!');
    }
}
