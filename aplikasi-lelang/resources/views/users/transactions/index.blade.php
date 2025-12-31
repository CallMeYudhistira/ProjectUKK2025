@extends('layouts.app')
@section('title', 'Transaksi | Lelang')
@section('content')
    <div class="container p-3 mt-4">
        <div class="d-flex my-3">
            <h1>Daftar Barang</h1>

            <form class="d-flex ms-auto" action="/masyarakat/transaksi/lelang" method="get">
                <input class="form-control m-2" type="search" name="keyword" placeholder="Nama barang... 🔍" autocomplete="off"
                    @isset($keyword) value="{{ $keyword }}" @endisset />
                <button class="btn btn-outline-primary my-2" type="submit">Search</button>
            </form>
        </div>

        @if ($products->isEmpty())
            <div class="alert alert-info" role="alert">
                Tidak ada barang yang dilelang!
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-4 g-5">
                @foreach ($products as $product)
                    @php
                        $pict = $product->pict ?? 'photo.png';
                    @endphp

                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('image/product/' . $pict) }}" class="card-img-top" alt="Foto Kendaraan"
                                style="max-height: 150px; object-fit: contain;">

                            <div class="card-body">
                                <h6 class="card-title">{{ $product->name }}</h6>
                                <p class="card-text" style="font-size: 14px;">{{ $product->description }}</p>
                            </div>

                            <div class="px-1">
                                <table class="table">
                                    <tr>
                                        <th>Status</th>
                                        <td>:</td>
                                        <td style="text-transform: capitalize;">{{ $product->status }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="card-body">
                                <a href="/masyarakat/transaksi/lelang/{{ $product->id }}" class="btn btn-success w-100">
                                    Detail Barang
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div style="width: fit-content; margin: 2rem auto;">
                {{ $products->links() }}
            </div>
        @endif
    </div>
@endsection
