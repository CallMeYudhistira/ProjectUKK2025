@extends('layouts.app')
@section('title', 'Laporan Hasil Lelang')

@section('content')
    <div class="container mt-4">
        <h4 class="fw-bold mb-4">Laporan Hasil Lelang</h4>

        <!-- FILTER -->
        <form method="GET" class="row g-3 mb-4">
            <div class="col-md-4">
                <label class="form-label">Tanggal Mulai</label>
                <input type="date" name="start_date" value="{{ $start }}" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Tanggal Akhir</label>
                <input type="date" name="end_date" value="{{ $end }}" class="form-control">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button class="btn btn-primary me-2">Tampilkan</button>

                <a href="{{ route('laporan.lelang.cetak', request()->query()) }}" target="_blank" class="btn btn-secondary">
                    Cetak
                </a>
            </div>
        </form>

        <!-- TABLE -->
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Barang</th>
                    <th>Harga Awal</th>
                    <th>Harga Menang</th>
                    <th>Pemenang</th>
                    <th>Admin</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($auctions as $i => $auction)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $auction->product->name }}</td>
                        <td>Rp {{ number_format($auction->starting_price) }}</td>
                        <td>
                            Rp {{ number_format($auction->highestBid->bid_price ?? 0) }}
                        </td>
                        <td>{{ $auction->winner->name ?? '-' }}</td>
                        <td>{{ $auction->admin->name }}</td>
                        <td>{{ $auction->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            Tidak ada data laporan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
