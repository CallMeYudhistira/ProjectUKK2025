@extends('layouts.app')
@section('title', 'Kelola Data | Barang')
@section('content')
    <div class="container p-3 mt-4">
        <h1>Kelola Barang</h1>
        <div class="d-flex my-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                Tambah Data
            </button>
            @include('admin.products.modal.create')
            <form class="d-flex ms-auto" action="/admin/barang/" method="get">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Search 🔍" autocomplete="off"
                    @isset($keyword) value="{{ $keyword }}" @endisset />
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
        <table class="table mt-5">
            <thead>
                <tr style="border-top: 1px solid #ddd;">
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col" colspan="2" class="text-center" style="width: 10%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $i => $product)
                    @php
                        $pict = $product->pict;
                        if ($pict == null) {
                            $pict = 'photo.png';
                        }
                    @endphp
                    <tr>
                        <th scope="row">{{ $products->firstItem() + $i++ }}</th>
                        <td><img src="{{ asset('image/product/' . $pict) }}" alt="Foto Barang"
                                style="width: 120px; height: 80px; border-radius: 8px; object-fit: contain;"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#update{{ $product->id }}">
                                Ubah
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $product->id }}">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @include('admin.products.modal.edit')
                    @include('admin.products.modal.delete')
                @endforeach
            </tbody>
        </table>

        <div style="width: fit-content; margin: 2rem auto;">
            {{ $products->links() }}
        </div>
    </div>
@endsection
