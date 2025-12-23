@extends('layouts.app')
@section('title', 'Dashboard | Nasabah')

@section('content')
    <div class="container my-4">

        @if (!$cicilan)
            <h3 class="fw-bold mb-4 pt-4">
                Selamat Datang, {{ Auth::user()->name }}
            </h3>
            <div class="alert alert-info">
                Anda belum memiliki cicilan aktif.
            </div>
        @else
            <!-- STATUS CICILAN -->
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="card p-4 shadow-sm">

                        <h3 class="fw-bold my-3">
                            Selamat Datang, {{ Auth::user()->name }}
                        </h3>
                        <hr style="margin-bottom: 2rem;">
                        <h5 class="mb-3">Status Cicilan</h5>
                        <h4 class="fw-bold mb-3">{{ $cicilan->nama_kendaraan }}</h4>
                        <p class="mb-3">
                            Total Kredit :
                            <strong>Rp {{ number_format($cicilan->total, 0, ',', '.') }}</strong>
                        </p>
                        <p class="mb-3">
                            Sisa Cicilan :
                            <strong class="text-danger">
                                Rp {{ number_format($cicilan->sisa, 0, ',', '.') }}
                            </strong>
                        </p>
                        <p class="mb-3">
                            Cicilan / Bulan :
                            <strong>
                                Rp {{ number_format($cicilan->cicilan, 0, ',', '.') }}
                            </strong>
                        </p>

                        <span
                            class="badge
                    {{ $cicilan->status_bayar == 'LUNAS' ? 'bg-success' : 'bg-warning text-dark' }} p-3 mb-1">
                            {{ $cicilan->status_bayar }}
                        </span>
                    </div>
                </div>

                <!-- PROGRESS -->
                <div class="col-md-6">
                    <div class="card p-4 shadow-sm">
                        <h4>Progress Cicilan</h4>
                        <div id="chartProgress"></div>
                        <p class="text-center mt-2">
                            {{ $cicilan->periode_terbayar }} /
                            {{ $cicilan->waktu }} Bulan
                        </p>
                    </div>
                </div>
            </div>

            <!-- RIWAYAT PEMBAYARAN -->
            <div class="card p-3 shadow-sm">
                <h5>Riwayat Pembayaran</h5>
                <table class="table table-sm mt-3">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nominal</th>
                            <th>Sisa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayat as $r)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($r->created_at)->translatedFormat('d M Y') }}</td>
                                <td>
                                    Rp {{ number_format($r->amount_of_paid, 0, ',', '.') }}
                                </td>
                                <td>
                                    Rp {{ number_format($r->remaining_debt, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif

    </div>

    <script>
        var options = {
            chart: {
                type: 'radialBar',
                height: 280,
                fontFamily: 'Elms Sans, sans-serif'
            },
            series: [{{ $progress ?? 0 }}],
            labels: ['Progress'],
            colors: ['#2244FF'],
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        value: {
                            fontSize: '22px',
                            formatter: function(val) {
                                return val + '%';
                            }
                        }
                    }
                }
            }
        };

        var chart = new ApexCharts(
            document.querySelector("#chartProgress"),
            options
        );

        chart.render();
    </script>

@endsection
