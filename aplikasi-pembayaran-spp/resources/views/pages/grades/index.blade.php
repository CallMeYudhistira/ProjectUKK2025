@extends('layouts.app')
@section('title', 'Kelola Data | Kelas')
@section('content')
    <div class="container p-3 mt-4">
        <h1>Kelola Kelas</h1>

        <div class="d-flex my-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                Tambah Data
            </button>
            @include('pages.grades.modal.create')

            <form class="d-flex ms-auto" action="/kelas" method="get">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Nama kelas... 🔍"
                    autocomplete="off" max="{{ now()->format('Y') }}"
                    @isset($keyword) value="{{ $keyword }}" @endisset />
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>

        <table class="table mt-5 align-middle">
            <thead>
                <tr style="border-top: 1px solid #ddd;">
                    <th scope="col">#</th>
                    <th scope="col">Nama Kelas</th>
                    <th scope="col">Kompetensi Keahlian</th>
                    <th scope="col" colspan="2" class="text-center" style="width: 10%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grades as $i => $grade)
                    <tr>
                        <th scope="row">{{ $grades->firstItem() + $i++ }}</th>
                        <td>{{ $grade->name }}</td>
                        <td>{{ $grade->major }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#update{{ $grade->id }}">
                                Ubah
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $grade->id }}">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @include('pages.grades.modal.edit')
                    @include('pages.grades.modal.delete')
                @endforeach
            </tbody>
        </table>

        <div style="width: fit-content; margin: 2rem auto;">
            {{ $grades->links() }}
        </div>
    </div>
@endsection
