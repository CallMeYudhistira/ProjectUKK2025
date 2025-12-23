@extends('layouts.app')
@section('title', 'Laporan | Kendaraan')
@section('content')
    <div class="container p-3 mt-4">
        <div class="d-flex my-5">
            <h1>Laporan</h1>
            <form class="d-flex ms-auto m-2" action="/admin/laporan/" method="get">
                <div class="mx-2">
                <select name="status" class="form-select" style="width: 350px;">
                    <option value="semua" selected>Semua</option>
                    <option value="LUNAS" {{ $status == 'LUNAS' ? 'selected' : '' }}>Lunas</option>
                    <option value="BELUM" {{ $status == 'BELUM' ? 'selected' : '' }}>Belum Lunas</option>
                </select>
            </div>
                <input class="form-control me-2" type="date" name="dari"
                    @isset($dari) value="{{ $dari }}" @endisset />
                <label class="form-label m-2"> >> </label>
                <input class="form-control mx-2" type="date" name="sampai"
                    @isset($sampai) value="{{ $sampai }}" @endisset />
                <button class="btn btn-outline-primary" type="submit">Filter</button>
            </form>
            <button type="button" class="btn border-0" disabled> - </button>
            <form class="d-flex m-2" action="/admin/laporan/cetak/" method="get" target="_blank">
                <input type="hidden" name="status" value="{{ $status }}">
                <input type="hidden" name="dari" value="{{ $dari }}">
                <input type="hidden" name="sampai" value="{{ $sampai }}">
                <button class="btn btn-success" type="submit">Cetak Laporan</button>
            </form>
        </div>
        <table class="table mt-5">
            <thead>
                <tr style="border-top: 1px solid #ddd;">
                    <th scope="col">#</th>
                    <th scope="col">Tanggal Cicilan</th>
                    <th scope="col">Total</th>
                    <th scope="col">Sisa</th>
                    <th scope="col">Waktu dan Bunga</th>
                    <th scope="col">Bulan Belum Dibayar</th>
                    <th scope="col">Cicilan Per Bulan</th>
                    <th scope="col" class="text-center" style="width: 10%;">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instalments as $i => $instalment)
                    <tr>
                        <td scope="row">{{ $i + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($instalment->tgl_pengajuan)->isoFormat('dddd, DD MMMM Y') }}
                        </td>
                        <td>{{ 'Rp ' . number_format($instalment->total, '0', ',', '.') }}</td>
                        <td>{{ 'Rp ' . number_format($instalment->sisa, '0', ',', '.') }}</td>
                        <td>{{ $instalment->waktu }} Bulan - {{ $instalment->bunga * 100 }}%</td>
                        <td>{{ $instalment->waktu - $instalment->periode_terbayar }} Bulan</td>
                        <td>{{ 'Rp ' . number_format($instalment->cicilan, '0', ',', '.') }}</td>
                        <td style="text-align: center; font-size: 1.2rem; text-transform: capitalize;">
                            @if ($instalment->status_bayar == 'LUNAS')
                                <span class="badge text-bg-success p-2 w-100">Lunas ✅</span>
                            @else
                                <span class="badge text-bg-danger p-2 w-100">Belum Lunas ❌</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
