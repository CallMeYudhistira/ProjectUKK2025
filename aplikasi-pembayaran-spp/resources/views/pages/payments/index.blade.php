@extends('layouts.app')
@section('title', 'Pembayaran | SPP')
@section('content')
    <div class="container p-3 mt-4">
        <h1>Pembayaran SPP</h1>

        <div class="d-flex my-3">
            <form class="d-flex ms-auto" action="/transaksi" method="get">
                <div class="mx-2">
                    <select name="grade_id" class="form-select" style="width: 350px;">
                        <option selected value="">Semua Kelas</option>
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}"
                                @isset($grade_id) {{ $grade_id == $grade->id ? 'selected' : '' }} @endisset>
                                {{ $grade->name }} - {{ $grade->major }}</option>
                        @endforeach
                    </select>
                </div>
                <input class="form-control me-2" type="search" name="keyword" placeholder="Cari nama siswa 🔍"
                    autocomplete="off" @isset($keyword) value="{{ $keyword }}" @endisset />
                <button class="btn btn-outline-primary" type="submit">Cari</button>
            </form>
        </div>

        <table class="table mt-5 align-middle">
            <thead>
                <tr style="border-top: 1px solid #ddd;">
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    @foreach ($months as $month)
                        <td scope="col">{{ $month->name }}</td>
                    @endforeach
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $i => $student)
                    <tr>
                        <td>{{ $student->nis }}</td>
                        <td>{{ $student->name }}</td>
                        @foreach ($months as $month)
                            @if (!$payments->where('nis', $student->nis)->where('month_paid', $month->number)->isEmpty())
                                <td class="text-center">✅</td>
                            @else
                                <td class="text-center">❌</td>
                            @endif
                        @endforeach
                        @php
                            $paidMonths = $payments->where('nis', $student->nis)->pluck('month_paid')->toArray();
                            $sudahLunas = count($paidMonths) == 12;
                        @endphp
                        <td class="text-center">
                            @if ($sudahLunas)
                                <span class="btn">Lunas ✔</span>
                            @else
                                <a class="btn btn-success" href="/transaksi/{{ $student->nis }}">Bayar</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="width: fit-content; margin: 2rem auto;">
            {{ $students->links() }}
        </div>
    </div>
@endsection
