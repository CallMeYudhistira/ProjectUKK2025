@extends('layouts.app')
@section('title', 'Detail Cicilan | Kendaraan')
@section('content')
    <div class="container p-3 mt-4">

        <h2>Detail Cicilan</h2>
        <div class="my-3">
            <a href="/admin/transaksi/cicilan" class="btn btn-dark">Kembali</a>
                <button type="button" class="btn btn-success mx-2" data-bs-toggle="modal"
                    data-bs-target="#bayar{{ $instalment->submission_id }}" {{ $month_check == false ? '' : 'disabled' }} {{ $paid_off_check == false ? '' : 'disabled' }}>
                    {{ $paid_off_check == false ? 'Bayar' : 'Lunas ✅' }}
                </button>
            @include('admin.transaction.modal.pay')
        </div>
        <div style="margin: auto; margin-bottom: 6vh;">
            <div class="row align-items-center m-2 my-4">
                <div class="col-6">
                    <h4>Foto KTP</h4>
                    <img src="{{ asset('images/ID/' . $instalment->ktp) }}" alt="Foto KTP"
                        style="max-width: 300px; max-height: 200px; border-radius: 8px; object-fit: cover;">
                </div>
                <div class="col-6">
                    <h4>Foto Kendaraan</h4>
                    <img src="{{ asset('images/' . $instalment->foto_kendaraan) }}" alt="Foto Kendaraan"
                        style="max-width: 300px; max-height: 200px; border-radius: 8px; object-fit: cover;">
                </div>
            </div>
            <div class="row align-items-center m-2">
                <div class="col-2">
                    Nama Nasabah
                </div>
                <div class="col-4">
                    : {{ $instalment->nama_nasabah }}
                </div>
                <div class="col-2">
                    Tanggal Pengajuan
                </div>
                <div class="col-4">
                    : {{ \Carbon\Carbon::parse($instalment->tgl_pengajuan)->isoFormat('dddd, DD MMMM Y') }}
                </div>
            </div>
            <div class="row align-items-center m-2">
                <div class="col-2">
                    Total Cicilan
                </div>
                <div class="col-4">
                    : {{ 'Rp ' . number_format($instalment->total, '0', ',', '.') }}
                </div>
                <div class="col-2">
                    Waktu dan Bunga
                </div>
                <div class="col-4">
                    : {{ $instalment->waktu }} Bulan - {{ $instalment->bunga * 100 }} %
                </div>
            </div>
            <div class="row align-items-center m-2">
                <div class="col-2">
                    Cicilan Per Bulan
                </div>
                <div class="col-4">
                    : {{ 'Rp ' . number_format($instalment->cicilan, '0', ',', '.') }}
                </div>
                <div class="col-2">
                    Bulan Sudah Dibayar
                </div>
                <div class="col-4">
                    : {{ $instalment->periode_terbayar }} dari {{ $instalment->waktu }} Bulan
                </div>
            </div>
            <div class="row align-items-center m-2">
                <div class="col-2">
                    Total Dibayar
                </div>
                <div class="col-4">
                    : {{ 'Rp ' . number_format($instalment->total_bayar, '0', ',', '.') }}
                </div>
                <div class="col-2">
                    Tunggakan
                </div>
                <div class="col-4">
                    : {{ 'Rp ' . number_format($instalment->sisa, '0', ',', '.') }}
                </div>
            </div>
            <div class="row align-items-center m-2">
                <div class="col-2">
                    Nama Kendaraan
                </div>
                <div class="col-4" style="text-transform: capitalize;">
                    : {{ $instalment->tipe_kendaraan }} - {{ $instalment->nama_kendaraan }} -
                    {{ $instalment->merk_kendaraan }}
                </div>
                <div class="col-2">
                    Status
                </div>
                <div class="col-4" style="text-transform: capitalize;">
                    : {{ $instalment->status }}
                </div>
            </div>
        </div>
        <div class="my-3">
            <table class="table border-top mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal Bayar</th>
                        <th scope="col">Bayar</th>
                        <th scope="col">Sisa</th>
                        <th scope="col">Note</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $i => $payment)
                        <tr>
                            <td scope="row">{{ $i + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($payment->payment_date)->isoFormat('dddd, DD MMMM Y') }}</td>
                            <td>{{ 'Rp ' . number_format($payment->amount_of_paid, '0', ',', '.') }}</td>
                            <td>{{ 'Rp ' . number_format($payment->remaining_debt, '0', ',', '.') }}</td>
                            <td style="text-transform: capitalize;">{{ $payment->note }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
