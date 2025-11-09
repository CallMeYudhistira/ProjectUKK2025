@extends('layouts.app')
@section('title', 'Kelola Data | Kategori')
@section('content')
    <div class="container p-3 mt-4">
        <h1>Kelola Kategori</h1>
        <div class="d-flex my-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                Tambah Data
            </button>
            @include('categories.modal.create')
            <form class="d-flex ms-auto" action="/kategori/search" method="get">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Search 🔍" autocomplete="off"
                    @isset($keyword) value="{{ $keyword }}" @endisset />
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
        <table class="table mt-5">
            <thead>
                <tr style="border-top: 1px solid #ddd;">
                    <th scope="col">#</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col" colspan="2" class="text-center" style="width: 10%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $i => $category)
                    <tr>
                        <th scope="row">{{ $categories->firstItem() + $i++ }}</th>
                        <td>{{ $category->category_name }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#update{{ $category->category_id }}">
                                Ubah
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $category->category_id }}">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @include('categories.modal.update')
                    @include('categories.modal.delete')
                @endforeach
            </tbody>
        </table>

        <div style="width: fit-content; margin: 2rem auto;">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
