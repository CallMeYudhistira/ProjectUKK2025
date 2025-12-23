@extends('layouts.app')
@section('title', 'Kelola Data | Periode')
@section('content')
    <div class="container p-3 mt-4">
        <h1>Kelola Periode</h1>
        <div class="d-flex my-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                Tambah Data
            </button>
            @include('admin.periods.modal.create')
        </div>
        <table class="table mt-5">
            <thead>
                <tr style="border-top: 1px solid #ddd;">
                    <th scope="col">#</th>
                    <th scope="col">Waktu Periode (Bulan)</th>
                    <th scope="col">Bunga</th>
                    <th scope="col" colspan="2" class="text-center" style="width: 10%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($periods as $i => $period)
                    <tr>
                        <th scope="row">{{ $periods->firstItem() + $i++ }}</th>
                        <td>{{ $period->time_period }} Bulan</td>
                        <td>{{ $period->interest * 100 }} %</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#update{{ $period->period_id }}">
                                Ubah
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $period->period_id }}">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @include('admin.periods.modal.update')
                    @include('admin.periods.modal.delete')
                @endforeach
            </tbody>
        </table>

        <div style="width: fit-content; margin: 2rem auto;">
            {{ $periods->links() }}
        </div>
    </div>
@endsection
