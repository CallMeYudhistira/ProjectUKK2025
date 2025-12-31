@extends('layouts.app')
@section('title', 'Kelola Data | Users')
@section('content')
    <div class="container p-3 mt-4">
        <h1>Kelola Users</h1>

        <div class="d-flex my-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                Tambah Data
            </button>
            @include('admin.users.modal.create')

            <form class="d-flex ms-auto" action="/admin/users" method="get">
                <div class="mx-2">
                    <select name="role" class="form-select" style="width: 350px;">
                        <option selected value="">Semua Hak Akses</option>
                        <option value="admin" @isset($role) {{ $role == 'admin' ? 'selected' : '' }} @endisset>Admin</option>
                        <option value="masyarakat" @isset($role) {{ $role == 'masyarakat' ? 'selected' : '' }} @endisset>Masyarakat</option>
                    </select>
                </div>
                <input class="form-control me-2" type="search" name="keyword" placeholder="Nama... 🔍" autocomplete="off"
                    @isset($keyword) value="{{ $keyword }}" @endisset />
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>

        <table class="table mt-5 align-middle">
            <thead>
                <tr style="border-top: 1px solid #ddd;">
                    <th scope="col">#</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Username</th>
                    <th scope="col">Hak Akses</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col" colspan="2" class="text-center" style="width: 10%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $i => $user)
                    <tr>
                        <th scope="row">{{ $users->firstItem() + $i++ }}</th>
                        {{-- Kolom nama dengan overflow --}}
                        <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                            title="{{ $user->name }}">
                            {{ $user->name }}
                        </td>

                        <td>{{ $user->username }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->phone_number }}</td>

                        @if (Auth::user()->id == $user->id)
                            <td colspan="2">
                                <button type="button" class="btn w-100">
                                    -
                                </button>
                            </td>
                        @else
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#update{{ $user->id }}">
                                    Ubah
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $user->id }}">
                                    Hapus
                                </button>
                            </td>
                        @endif
                    </tr>
                    @include('admin.users.modal.edit')
                    @include('admin.users.modal.delete')
                @endforeach
            </tbody>
        </table>

        <div style="width: fit-content; margin: 2rem auto;">
            {{ $users->links() }}
        </div>
    </div>
@endsection
