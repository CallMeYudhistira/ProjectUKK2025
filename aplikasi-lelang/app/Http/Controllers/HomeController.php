<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\AuctionDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function admin()
    {
        $totalAuctions = Auction::count();
        $openAuctions = Auction::where('status', 'dibuka')->count();
        $closedAuctions = Auction::where('status', 'ditutup')->count();
        $totalProducts = Product::count();

        // Lelang Aktif
        $activeAuctions = Auction::with([
            'product',
            'highestBid'
        ])
            ->where('status', 'dibuka')
            ->latest()
            ->take(5)
            ->get();

        // Lelang Terakhir Ditutup
        $closedRecent = Auction::with([
            'product',
            'winner',
            'highestBid'
        ])
            ->where('status', 'ditutup')
            ->latest()
            ->take(5)
            ->get();

        // Grafik status (yang sudah ada)
        $auctionStatus = [
            'dibuka' => Auction::where('status', 'dibuka')->count(),
            'ditutup' => Auction::where('status', 'ditutup')->count(),
        ];

        // Grafik lelang per bulan (tahun berjalan)
        $monthlyAuctions = Auction::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        // Inisialisasi 12 bulan (default 0)
        $auctionPerMonth = array_fill(1, 12, 0);

        foreach ($monthlyAuctions as $data) {
            $auctionPerMonth[$data->month] = $data->total;
        }

        return view('admin.index', compact(
            'totalAuctions',
            'openAuctions',
            'closedAuctions',
            'totalProducts',
            'activeAuctions',
            'closedRecent',
            'auctionStatus',
            'auctionPerMonth'
        ));
    }

    public function masyarakat()
    {
        $userId = Auth::id();

        // Total lelang aktif
        $totalActiveAuctions = Auction::where('status', 'dibuka')->count();

        // Total lelang yang diikuti user
        $totalJoinedAuctions = AuctionDetail::where('user_id', $userId)
            ->distinct('auction_id')
            ->count('auction_id');

        // Total kemenangan (jika sudah ditentukan pemenang)
        $totalWins = Auction::where('winner_id', $userId)
            ->where('status', 'ditutup')
            ->count();

        // Grafik bid user per bulan
        $monthlyBids = AuctionDetail::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
            ->where('user_id', $userId)
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        $bidPerMonth = array_fill(1, 12, 0);
        foreach ($monthlyBids as $data) {
            $bidPerMonth[$data->month] = $data->total;
        }

        // Daftar lelang aktif
        $activeAuctions = Auction::with('product')
            ->where('status', 'dibuka')
            ->latest()
            ->get();

        return view('users.index', compact(
            'totalActiveAuctions',
            'totalJoinedAuctions',
            'totalWins',
            'bidPerMonth',
            'activeAuctions'
        ));
    }
}
