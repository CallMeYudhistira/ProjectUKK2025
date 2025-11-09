@extends('layouts.app')
@section('title', 'Kelola Data | Produk')
@section('content')
    <div class="container p-3 mt-4">
        <h1>Kelola Produk</h1>
        <div class="d-flex my-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                Tambah Data
            </button>
            @include('products.modal.create')
            <form class="d-flex ms-auto" action="/produk/search" method="get">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Search 🔍" autocomplete="off"
                    @isset($keyword) value="{{ $keyword }}" @endisset />
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
        <table class="table mt-5">
            <thead>
                <tr style="border-top: 1px solid #ddd;">
                    <th scope="col">#</th>
                    <th scope="col">Foto Produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Stok</th>
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
                        <td><img src="{{ asset('images/' . $pict) }}" alt="Foto Produk"
                                style="width: 120px; height: 80px; border-radius: 8px; object-fit: cover;"></td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->category_name }}</td>
                        <td>{{ $product->unit_name }}</td>
                        <td>{{ 'Rp ' . number_format($product->purchase_price, 0, ',', '.') }}</td>
                        <td>{{ 'Rp ' . number_format($product->selling_price, 0, ',', '.') }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#update{{ $product->product_id }}">
                                Ubah
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $product->product_id }}">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @include('products.modal.update')
                    @include('products.modal.delete')
                @endforeach
            </tbody>
        </table>

        <div style="width: fit-content; margin: 2rem auto;">
            {{ $products->links() }}
        </div>
    </div>
@endsection
