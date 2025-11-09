<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|min:1',
        ]);

        $product = Product::find($request->product_id);

        $cart = Cart::where('product_id', $request->product_id)->where('user_id', Auth::user()->id)->first();
        if ($cart) {
            $quantity = $cart->quantity + $request->quantity;
            $cart->update([
                'quantity' => $quantity,
                'subtotal' => $quantity * $product->selling_price,
            ]);
        } else {
            Cart::create([
                'product_id' => $request->product_id,
                'purchase_price' => $product->purchase_price,
                'selling_price' => $product->selling_price,
                'quantity' => $request->quantity,
                'subtotal' => $request->quantity * $product->selling_price,
                'user_id' => Auth::user()->id,
            ]);
        }

        return redirect('/transaksi');
    }

    public function delete($id)
    {
        Cart::find($id)->delete();
        return redirect('/transaksi');
    }
}
