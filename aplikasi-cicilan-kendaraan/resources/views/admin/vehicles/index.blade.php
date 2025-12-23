@extends('layouts.app')
@section('title', 'Kelola Data | Kendaraan')
@section('content')
    <div class="container p-3 mt-4">
        <h1>Kelola Kendaraan</h1>
        <div class="d-flex my-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                Tambah Data
            </button>
            @include('admin.vehicles.modal.create')
            <form class="d-flex ms-auto" action="/admin/kendaraan/search" method="get">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Search 🔍" autocomplete="off"
                    @isset($keyword) value="{{ $keyword }}" @endisset />
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
        <table class="table mt-5">
            <thead>
                <tr style="border-top: 1px solid #ddd;">
                    <th scope="col">#</th>
                    <th scope="col">Foto Kendaraan</th>
                    <th scope="col">Nama Kendaraan</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Tahun Produksi</th>
                    <th scope="col" colspan="2" class="text-center" style="width: 10%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $i => $vehicle)
                    @php
                        $pict = $vehicle->pict;
                        if ($pict == null) {
                            $pict = 'photo.png';
                        }
                    @endphp
                    <tr>
                        <th scope="row">{{ $vehicles->firstItem() + $i++ }}</th>
                        <td><img src="{{ asset('images/' . $pict) }}" alt="Foto Kendaraan"
                                style="width: 120px; height: 80px; border-radius: 8px; object-fit: cover;"></td>
                        <td>{{ $vehicle->vehicle_name }}</td>
                        <td>{{ $vehicle->brand }}</td>
                        <td>{{ $vehicle->type }}</td>
                        <td>{{ 'Rp ' . number_format($vehicle->price, 0, ',', '.') }}</td>
                        <td>{{ $vehicle->production_year }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#update{{ $vehicle->vehicle_id }}">
                                Ubah
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $vehicle->vehicle_id }}">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @include('admin.vehicles.modal.update')
                    @include('admin.vehicles.modal.delete')
                @endforeach
            </tbody>
        </table>

        <div style="width: fit-content; margin: 2rem auto;">
            {{ $vehicles->links() }}
        </div>
    </div>
@endsection
