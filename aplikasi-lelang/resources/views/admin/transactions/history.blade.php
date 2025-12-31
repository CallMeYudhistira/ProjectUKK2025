@extends('layouts.app')
@section('title', 'Transaksi | Lelang')
@section('content')
    <div class="container p-3 mt-4">
        <div class="d-flex my-3">
            <h1>Riwayat Lelang</h1>

            <form class="d-flex my-2 ms-auto" action="/admin/transaksi/riwayat" method="get">
                <input class="form-control me-2" type="date" name="first"
                    @isset($first) value="{{ $first }}" @endisset />
                <label for="second" class="form-label m-2">=></label>
                <input class="form-control me-2" type="date" name="second"
                    @isset($second) value="{{ $second }}" @endisset />
                <button class="btn btn-outline-primary" type="submit">Filter</button>
            </form>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-5">
            @foreach ($auctions as $auction)
                @php
                    $pict = $auction->product->pict ?? 'photo.png';
                @endphp

                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('image/product/' . $pict) }}" class="card-img-top" alt="Foto Kendaraan"
                            style="max-height: 150px; object-fit: contain;">

                        <div class="card-body">
                            <h6 class="card-title">{{ $auction->product->name }}</h6>
                            <p class="card-text" style="font-size: 14px;">{{ $auction->product->description }}</p>
                        </div>

                        <div class="px-1">
                            <table class="table">
                                <tr>
                                    <th>Pelelang</th>
                                    <td>:</td>
                                    <td style="text-transform: capitalize;">{{ $auction->admin->name }}</td>
                                </tr>
                                <tr>
                                    <th>Pemenang</th>
                                    <td>:</td>
                                    <td style="text-transform: capitalize;">{{ $auction->winner->name }}</td>
                                </tr>
                                <tr>
                                    <th>Harga Tertinggi</th>
                                    <td>:</td>
                                    <td style="text-transform: capitalize;">Rp.
                                        {{ number_format($auction->highest_price, '0', ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pelelangan</th>
                                    <td>:</td>
                                    <td style="text-transform: capitalize;">
                                        {{ \Carbon\Carbon::parse($auction->created_at)->isoFormat('D MMMM Y') }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="card-body">
                            <a href="/admin/transaksi/riwayat/{{ $auction->id }}" class="btn btn-success w-100">
                                Detail Lelang
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <div style="width: fit-content; margin: 2rem auto;">
            {{ $auctions->links() }}
        </div>
    </div>
@endsection
