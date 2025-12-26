@extends('layouts.app')
@section('title', 'Laporan | SPP')
@section('content')
    <div class="container p-3 mt-4">
        <h1>Laporan Pembayaran SPP</h1>

        <div class="d-flex my-3">
            <form class="d-flex ms-auto" action="/laporan" method="get">
                <div class="mx-2">
                    <select name="grade_id" class="form-select" style="width: 350px;" id="grade_id">
                        <option selected value="">Semua Kelas</option>
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}"
                                @isset($grade_id) {{ $grade_id == $grade->id ? 'selected' : '' }} @endisset>
                                {{ $grade->name }} - {{ $grade->major }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
            <form class="d-flex" action="/laporan/cetak" method="get" target="_blank">
                <input type="hidden" name="grade_id"
                    @isset($grade_id) value="{{ $grade_id }}" @endisset>
                <button class="btn btn-success" type="submit">Cetak</button>
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
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        const filter = document.getElementById('grade_id');

        filter.addEventListener('change', function() {
            this.form.submit();
        });
    </script>
@endsection
