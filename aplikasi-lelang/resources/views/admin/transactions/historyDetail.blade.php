@php
    $pict = $auction->product->pict;
    if ($pict == null) {
        $pict = 'photo.png';
    }
@endphp

@extends('layouts.app')
@section('title', 'Detail | Lelang')
@section('content')
    <div class="container p-3 mt-4">
        <a href="/admin/transaksi/riwayat" class="btn btn-dark my-2">Kembali</a>
        <div class="row">
            <div class="col-sm-5 text-center">
                <img src="{{ asset('image/product/' . $pict) }}" alt="Lelang"
                    style="max-width: 100%; object-fit: cover; border-radius: 12px;">
            </div>
            <div class="col-sm-7">
                <h2>Detail Lelang | {{ $auction->product->name }}</h2>
                <div class="row my-2">
                    <div class="col-sm-12">
                        <p>{{ $auction->product->description }}</p>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-sm-5" style="font-weight: 500;">Pelelang</div>
                    <div class="col-sm-2">:</div>
                    <div class="col-sm-5 text-capitalize">{{ $auction->admin->name }}</div>
                </div>
                <div class="row my-2">
                    <div class="col-sm-5" style="font-weight: 500;">Pemenang</div>
                    <div class="col-sm-2">:</div>
                    <div class="col-sm-5 text-capitalize">{{ $auction->winner->name }}</div>
                </div>
                <div class="row my-2">
                    <div class="col-sm-5" style="font-weight: 500;">Harga Awal</div>
                    <div class="col-sm-2">:</div>
                    <div class="col-sm-5 text-capitalize">Rp.
                        {{ number_format($auction->starting_price, '0', ',', '.') }}</div>
                </div>
                <div class="row my-2">
                    <div class="col-sm-5" style="font-weight: 500;">Harga Tertinggi</div>
                    <div class="col-sm-2">:</div>
                    <div class="col-sm-5 text-capitalize">Rp.
                        {{ number_format($auction->highest_price ? $auction->highest_price : $auction->starting_price, '0', ',', '.') }}
                    </div>
                </div>
            </div>
        </div>

        <table class="table mt-5 align-middle">
            <thead>
                <tr style="border-top: 1px solid #ddd;">
                    <th scope="col">#</th>
                    <th scope="col">Nama Masyarakat</th>
                    <th scope="col">Nominal Pengajuan</th>
                    <th scope="col">Waktu Pengajuan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($auction->auction_detail as $i => $bid)
                    <tr>
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>{{ $bid->user->name }}</td>
                        <td>Rp {{ number_format($bid->bid_price) }}</td>
                        <td>{{ \Carbon\Carbon::parse($bid->created_at)->isoFormat('D MMMM Y, HH:mm') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
