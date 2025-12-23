@extends('layouts.app')
@section('title', 'Kelola Cicilan | Kendaraan')
@section('content')
    <div class="container p-3 mt-4">
        <div class="d-flex my-5">
            <h1>Kelola Cicilan</h1>
            <form class="d-flex ms-auto my-2" action="/nasabah/transaksi/cicilan/" method="get">
                <div class="mx-2">
                <select name="status" class="form-select" style="width: 350px;">
                    <option value="semua" selected>Semua</option>
                    <option value="LUNAS" {{ $status == 'LUNAS' ? 'selected' : '' }}>Lunas</option>
                    <option value="BELUM" {{ $status == 'BELUM' ? 'selected' : '' }}>Belum Lunas</option>
                </select>
            </div>
                <input class="form-control me-2" type="date" name="tanggal"
                    @isset($tanggal) value="{{ $tanggal }}" @endisset />
                <button class="btn btn-outline-primary" type="submit">Search</button>
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
                    <th scope="col">Cicilan Per Bulan</th>
                    <th scope="col">Foto KTP</th>
                    <th scope="col" class="text-center" style="width: 10%;">Status</th>
                    <th scope="col" class="text-center" style="width: 10%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instalments as $i => $instalment)
                    @php
                        if ($instalment->status_pengajuan == 'diterima') {
                            $class = 'success';
                        } elseif ($instalment->status_pengajuan == 'diajukan') {
                            $class = 'primary';
                        } else {
                            $class = 'danger';
                        }
                    @endphp
                    <tr>
                        <td scope="row">{{ $instalments->firstItem() + $i++ }}</td>
                        <td>{{ \Carbon\Carbon::parse($instalment->tgl_pengajuan)->isoFormat('dddd, DD MMMM Y') }}
                        </td>
                        <td>{{ 'Rp ' . number_format($instalment->total, '0', ',', '.') }}</td>
                        <td>{{ 'Rp ' . number_format($instalment->sisa, '0', ',', '.') }}</td>
                        <td>{{ $instalment->waktu }} Bulan - {{ $instalment->bunga * 100 }}%</td>
                        <td>{{ 'Rp ' . number_format($instalment->cicilan, '0', ',', '.') }}</td>
                        <td><img src="{{ asset('images/ID/' . $instalment->ktp) }}" alt="Foto KTP"
                                style="width: 120px; height: 80px; border-radius: 8px; object-fit: cover;"></td>
                        <td style="text-align: center; font-size: 1.2rem; text-transform: capitalize;"><span
                                class="badge text-bg-{{ $class }} p-2">{{ $instalment->status_pengajuan }}</span></td>
                        @if ($instalment->status_pengajuan == 'diterima')
                            <td class="text-center"><a
                                    href="/nasabah/transaksi/cicilan/detail/{{ $instalment->submission_id }}"
                                    class="btn btn-secondary">Detail</a></td>
                        @else
                            <td class="text-center"><button class="btn w-100" type="button">-</button></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="width: fit-content; margin: 2rem auto;">
            {{ $instalments->links() }}
        </div>
    </div>
@endsection
