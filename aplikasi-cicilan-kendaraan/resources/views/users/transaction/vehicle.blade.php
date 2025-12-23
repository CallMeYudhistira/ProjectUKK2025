@extends('layouts.app')
@section('title', 'Cari Kendaraan | Cicilan')
@section('content')
    <div class="container p-3 mt-4">
        <div class="d-flex my-5">
            <h1>Cari Kendaraan</h1>
            <form class="d-flex ms-auto my-2" action="/nasabah/transaksi/kendaraan/search" method="get">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Search 🔍" autocomplete="off"
                    @isset($keyword) value="{{ $keyword }}" @endisset />
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-5">
            @foreach ($vehicles as $vehicle)
                @php
                    $pict = $vehicle->pict ?? 'photo.png';
                @endphp

                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('images/' . $pict) }}" class="card-img-top" alt="Foto Kendaraan"
                            style="max-height: 250px; object-fit: cover;">

                        <div class="card-body">
                            <h5 class="card-title">{{ $vehicle->vehicle_name }}</h5>
                        </div>

                        <table class="table">
                            <tr>
                                <th>Brand</th>
                                <td>:</td>
                                <td>{{ $vehicle->brand }}</td>
                            </tr>
                            <tr>
                                <th>Jenis</th>
                                <td>:</td>
                                <td>{{ $vehicle->type }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Produksi</th>
                                <td>:</td>
                                <td>{{ $vehicle->production_year }}</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>:</td>
                                <td>{{ 'Rp ' . number_format($vehicle->price, 0, ',', '.') }}</td>
                            </tr>
                        </table>

                        <div class="card-body">
                            <button type="button" class="btn btn-success w-100" data-bs-toggle="modal"
                                data-bs-target="#buy{{ $vehicle->vehicle_id }}">
                                Beli
                            </button>
                            @include('users.transaction.modal.buy')
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <div style="width: fit-content; margin: 2rem auto;">
            {{ $vehicles->links() }}
        </div>
    </div>
@endsection
