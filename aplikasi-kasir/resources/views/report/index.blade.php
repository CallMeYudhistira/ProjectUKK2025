@extends('layouts.app')
@section('title', 'Laporan | Penjualan')
@section('content')
    <div class="container p-3 mt-4">
        <h1>Laporan Penjualan</h1>
        <div class="d-flex my-3">
            <form action="/laporan/cetak/excel" method="get">
                <input type="hidden" name="dari"
                    @isset($dari) value="{{ $dari }}" @endisset />
                <input type="hidden" name="sampai"
                    @isset($sampai) value="{{ $sampai }}" @endisset />
                <button class="btn btn-success" type="submit">Cetak Excel</button>
            </form>
            <form action="/laporan/cetak/pdf" method="get">
                <input type="hidden" name="dari"
                    @isset($dari) value="{{ $dari }}" @endisset />
                <input type="hidden" name="sampai"
                    @isset($sampai) value="{{ $sampai }}" @endisset />
                <button class="btn btn-warning mx-2" type="submit">Cetak PDF</button>
            </form>
            <form class="d-flex ms-auto" action="/laporan/filter" method="get">
                <input class="form-control me-2" type="date" name="dari"
                    @isset($dari) value="{{ $dari }}" @endisset />
                <label class="form-label m-2"> >> </label>
                <input class="form-control mx-2" type="date" name="sampai"
                    @isset($sampai) value="{{ $sampai }}" @endisset />
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
        <table class="table mt-5">
            <thead>
                <tr style="border-top: 1px solid #ddd;">
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Modal</th>
                    <th scope="col">Laba</th>
                    <th scope="col">Total</th>
                    <th scope="col">Bayar</th>
                    <th scope="col">Kembalian</th>
                    <th scope="col">Nama Kasir</th>
                    <th scope="col" class="text-center" style="width: 5%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $i => $transaction)
                    <tr>
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>{{ \Carbon\Carbon::parse($transaction->date)->isoFormat('DD MMM Y') }}</td>
                        <td>{{ 'Rp ' . number_format($transaction->modal, '0', ',', '.') }}</td>
                        <td>{{ 'Rp ' . number_format($transaction->laba, '0', ',', '.') }}</td>
                        <td>{{ 'Rp ' . number_format($transaction->total, '0', ',', '.') }}</td>
                        <td>{{ 'Rp ' . number_format($transaction->paid, '0', ',', '.') }}</td>
                        <td>{{ 'Rp ' . number_format($transaction->kembali, '0', ',', '.') }}</td>
                        <td>{{ $transaction->name }}</td>
                        <td>
                            <a href="/laporan/detail/{{ $transaction->transaction_id }}"
                                class="btn btn-secondary text-center">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="width: fit-content; margin: 2rem auto;">
            {{ $transactions->links() }}
        </div>
    </div>
@endsection
