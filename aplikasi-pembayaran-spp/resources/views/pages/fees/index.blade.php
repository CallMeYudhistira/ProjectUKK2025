@extends('layouts.app')
@section('title', 'Kelola Data | SPP')
@section('content')
    <div class="container p-3 mt-4">
        <h1>Kelola SPP</h1>

        <div class="d-flex my-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                Tambah Data
            </button>
            @include('pages.fees.modal.create')

            <form class="d-flex ms-auto" action="/spp" method="get">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Tahun ajaran... 🔍"
                    autocomplete="off" max="{{ now()->format('Y') }}"
                    @isset($keyword) value="{{ $keyword }}" @endisset />
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>

        <table class="table mt-5 align-middle">
            <thead>
                <tr style="border-top: 1px solid #ddd;">
                    <th scope="col">#</th>
                    <th scope="col">Tahun Ajaran</th>
                    <th scope="col">Nominal</th>
                    <th scope="col" colspan="2" class="text-center" style="width: 10%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fees as $i => $fee)
                    <tr>
                        <th scope="row">{{ $fees->firstItem() + $i++ }}</th>
                        <td>{{ $fee->year }}</td>
                        <td>Rp. {{ number_format($fee->amount, '0', ',', '.') }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#update{{ $fee->id }}">
                                Ubah
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $fee->id }}">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @include('pages.fees.modal.edit')
                    @include('pages.fees.modal.delete')
                @endforeach
            </tbody>
        </table>

        <div style="width: fit-content; margin: 2rem auto;">
            {{ $fees->links() }}
        </div>
    </div>
@endsection
