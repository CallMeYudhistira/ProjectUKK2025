@extends('layouts.app')
@section('title', 'Kartu | SPP')
@section('content')
    <div class="container p-3 mt-4">
        <h1>Kartu SPP Siswa</h1>

        <div class="d-flex my-3">
            <form class="d-flex ms-auto" action="/kartu" method="get">
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
                    <th scope="col">Kelas</th>
                    <th scope="col">Sudah Dibayar</th>
                    <th scope="col">Sisa Tunggakan</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $i => $student)
                    <tr>
                        <td>{{ $student->nis }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->grade->name }} - {{ $student->grade->major }}</td>
                        <td>{{ $payments->where('nis', $student->nis)->count('nis') }} Bulan</td>
                        <td>{{ ($payments->where('nis', $student->nis)->count('nis') - 12) * -1 }} Bulan</td>
                        <td class="text-center">
                            <a href="/kartu/{{ $student->nis }}" class="btn btn-warning" target="_blank">Cetak Kartu</a>
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
