@extends('layouts.app')
@section('title', 'Kelola Data | Siswa')
@section('content')
    <div class="container p-3 mt-4">
        <h1>Kelola Siswa</h1>

        <div class="d-flex my-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                Tambah Data
            </button>
            @include('pages.students.modal.create')

            <form class="d-flex ms-auto" action="/siswa" method="get">
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
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">SPP</th>
                    <th scope="col" colspan="2" class="text-center" style="width: 10%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $i => $student)
                    <tr>
                        <td>{{ $student->nis }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->grade->name }} - {{ $student->grade->major }}</td>
                        <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                            title="{{ $student->address }}">{{ $student->address }}</td>
                        <td>{{ $student->phone_number }}</td>
                        <td>{{ 'Rp ' . number_format($student->fee->amount, '0', ',', '.') }} - {{ $student->fee->year }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#update{{ $student->nis }}">Ubah</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $student->nis }}">Hapus</button>
                        </td>
                    </tr>

                    @include('pages.students.modal.edit')
                    @include('pages.students.modal.delete')
                @endforeach
            </tbody>
        </table>

        <div style="width: fit-content; margin: 2rem auto;">
            {{ $students->links() }}
        </div>
    </div>
@endsection
