@extends('layouts.app')
@section('title', 'Kelola Data | Satuan')
@section('content')
    <div class="container p-3 mt-4">
        <h1>Kelola Satuan</h1>
        <div class="d-flex my-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                Tambah Data
            </button>
            @include('units.modal.create')
            <form class="d-flex ms-auto" action="/satuan/search" method="get">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Search 🔍" autocomplete="off"
                    @isset($keyword) value="{{ $keyword }}" @endisset />
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
        <table class="table mt-5">
            <thead>
                <tr style="border-top: 1px solid #ddd;">
                    <th scope="col">#</th>
                    <th scope="col">Nama Satuan</th>
                    <th scope="col" colspan="2" class="text-center" style="width: 10%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($units as $i => $unit)
                    <tr>
                        <th scope="row">{{ $units->firstItem() + $i++ }}</th>
                        <td>{{ $unit->unit_name }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#update{{ $unit->unit_id }}">
                                Ubah
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $unit->unit_id }}">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @include('units.modal.update')
                    @include('units.modal.delete')
                @endforeach
            </tbody>
        </table>

        <div style="width: fit-content; margin: 2rem auto;">
            {{ $units->links() }}
        </div>
    </div>
@endsection
