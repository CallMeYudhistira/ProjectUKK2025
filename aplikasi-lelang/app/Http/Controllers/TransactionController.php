<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\AuctionDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $products = Product::query();
        if ($keyword) {
            $products->where('name', 'like', "%$keyword%");
        }
        if (Auth::user()->role == 'admin') {
            $status = $request->status;
            if ($status) {
                $products->where('status', '=', "$status");
            }
        }
        if (Auth::user()->role != 'admin') {
            $products->where('status', '=', "aktif");
        }
        $products = $products->simplePaginate(10);

        if (Auth::user()->role == 'admin') {
            return view('admin.transactions.index', compact('products', 'keyword', 'status'));
        } else {
            return view('users.transactions.index', compact('products', 'keyword'));
        }
    }

    public function show($id)
    {
        $product = Product::find($id);
        $auction = null;

        if ($product->status === 'aktif') {
            $auction = Auction::with('auction_detail')->where('status', 'dibuka')->where('product_id', $id)->first();
        } else {
            if (Auth::user()->role != 'admin') {
                return back()->with('error', 'Barang Tidak Dilelang!');
            }
        }

        if (Auth::user()->role == 'admin') {
            return view('admin.transactions.detail', compact('product', 'auction'));
        } else {
            $isWinner = false;
            if ($auction->winner_id == Auth::user()->id) {
                $isWinner = true;
            }
            return view('users.transactions.detail', compact('product', 'auction', 'isWinner'));
        }
    }

    public function open(Request $request, Product $product)
    {
        $request->validate([
            'starting_price' => 'required|integer|min:1'
        ]);

        Product::where('id', $product->id)->update([
            'status' => 'aktif',
        ]);

        Auction::create([
            'product_id' => $product->id,
            'starting_price' => $request->starting_price,
            'admin_id' => Auth::id(),
            'status' => 'dibuka'
        ]);

        return back()->with('success', 'Lelang dibuka');
    }

    public function close(Auction $auction)
    {
        $highestBid = $auction->highestBid;

        $auction->update([
            'status' => 'ditutup',
            'winner_id' => $highestBid?->user_id
        ]);

        Product::where('id', $auction->product_id)->update([
            'status' => 'non-aktif',
        ]);

        return redirect('/admin/transaksi/riwayat')->with('success', 'Lelang ditutup');
    }

    public function bid(Request $request, Auction $auction)
    {
        abort_if($auction->status !== 'dibuka', 403);

        $lastBid = $auction->auction_detail()->max('bid_price') ?? $auction->starting_price;

        $request->validate([
            'bid_price' => 'required|integer|min:' . ($lastBid + 1)
        ]);

        AuctionDetail::create([
            'auction_id' => $auction->id,
            'user_id' => Auth::user()->id,
            'bid_price' => $request->bid_price,
        ]);

        if ($request->bid_price > $lastBid) {
            Auction::where('id', $auction->id)->update([
                'highest_price' => $request->bid_price,
                'winner_id' => Auth::user()->id,
            ]);
        }

        return back()->with('success', 'Bid berhasil');
    }

    public function history(Request $request)
    {
        $first = $request->first;
        $second = $request->second;

        $auctions = Auction::query()->where('status', 'ditutup');
        if ($first && $second) {
            $auctions->whereDate('created_at', '>=', $first)
                ->whereDate('created_at', '<=', $second);
        }
        if (Auth::user()->role != 'admin') {
            $auctions->where('winner_id', Auth::user()->id);
        }
        $auctions = $auctions->with('auction_detail', 'winner', 'admin', 'product')->simplePaginate('10');

        if (Auth::user()->role == 'admin') {
            return view('admin.transactions.history', compact('auctions', 'first', 'second'));
        } else {
            return view('users.transactions.history', compact('auctions', 'first', 'second'));
        }
    }

    public function historyDetail($id)
    {
        $auction = Auction::where('status', 'ditutup')->with('auction_detail', 'winner', 'admin', 'product')->find($id);

        if (Auth::user()->role == 'admin') {
            return view('admin.transactions.historyDetail', compact('auction'));
        } else {
            return view('users.transactions.historyDetail', compact('auction'));
        }
    }
}
