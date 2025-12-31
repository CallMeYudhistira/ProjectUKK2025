<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->start_date;
        $end   = $request->end_date;

        $auctions = Auction::with([
                'product',
                'admin',
                'winner',
                'highestBid'
            ])
            ->where('status', 'ditutup')
            ->when($start && $end, function ($query) use ($start, $end) {
                $query->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.reports.index', compact('auctions', 'start', 'end'));
    }

    public function print(Request $request)
    {
        $start = $request->start_date;
        $end   = $request->end_date;

        $auctions = Auction::with([
                'product',
                'admin',
                'winner',
                'highestBid'
            ])
            ->where('status', 'ditutup')
            ->when($start && $end, function ($query) use ($start, $end) {
                $query->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end);
            })
            ->get();

        $pdf = Pdf::loadView('admin.reports.print', compact('auctions', 'start', 'end'))->setPaper('a3', 'landscape');
        return $pdf->stream('laporan_kelas.pdf');
    }
}
