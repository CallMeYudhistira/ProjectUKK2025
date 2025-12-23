@extends('layouts.app')
@section('title', 'Dashboard | Admin')

@section('content')
    <div class="container my-4">

        <h3 class="fw-bold mb-4">Dashboard Admin</h3>

        <!-- SUMMARY CARD -->
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <small>Total Pengajuan</small>
                    <h4>{{ $totalPengajuan }}</h4>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <small>Total Kredit</small>
                    <h4>Rp {{ number_format($totalKredit, 0, ',', '.') }}</h4>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <small>Total Sisa Piutang</small>
                    <h4 class="text-danger">
                        Rp {{ number_format($totalSisa, 0, ',', '.') }}
                    </h4>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <small>Total Pembayaran Masuk</small>
                    <h4 class="text-success">
                        Rp {{ number_format($totalBayar, 0, ',', '.') }}
                    </h4>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <small>Cicilan Lunas</small>
                    <h4>{{ $totalLunas }}</h4>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <small>Cicilan Belum Lunas</small>
                    <h4 class="text-warning">{{ $totalBelumLunas }}</h4>
                </div>
            </div>
        </div>

        <!-- CHART -->
        <div class="row mb-5">
            <div class="col-md-8">
                <div class="card p-3 shadow-sm">
                    <h6>Pembayaran Bulanan</h6>
                    <div id="chartPembayaran"></div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <h6>Status Cicilan</h6>
                    <div id="chartStatus"></div>
                </div>
            </div>
        </div>

        <!-- TABEL TUNGGAKAN -->
        <div class="card p-3 shadow-sm mb-5">
            <h6 class="mb-3">Cicilan Belum Lunas (Prioritas)</h6>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Nasabah</th>
                        <th>Kendaraan</th>
                        <th>Sisa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tunggakan as $t)
                        <tr>
                            <td>{{ $t->nama_nasabah }}</td>
                            <td>{{ $t->nama_kendaraan }}</td>
                            <td class="text-danger">
                                Rp {{ number_format($t->sisa, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <script>
        var chartPembayaran = new ApexCharts(
            document.querySelector("#chartPembayaran"), {
                chart: {
                    type: 'bar',
                    height: 300,
                    fontFamily: 'Elms Sans, sans-serif'
                },
                colors: ['#2244FF', '#ABCDEF', '#FFDCAB'],
                plotOptions: {
                    bar: {
                        columnWidth: '45%',
                        distributed: true
                    }
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false
                },
                series: [{
                    name: 'Total Pembayaran',
                    data: @json($totalPembayaran)
                }],
                xaxis: {
                    categories: @json($bulan),
                    labels: {
                        style: {
                            fontFamily: 'Elms Sans, sans-serif',
                            fontSize: '12px',
                            colors: '#000'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value.toLocaleString('id-ID', {
                                style: 'currency',
                                currency: 'IDR'
                            });
                        },
                        style: {
                            fontFamily: 'Elms Sans, sans-serif',
                            fontSize: '12px',
                            colors: '#000'
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontFamily: 'Elms Sans, sans-serif'
                    }
                }
            }
        );

        chartPembayaran.render();
    </script>

    <script>
        var chartStatus = new ApexCharts(
            document.querySelector("#chartStatus"), {
                chart: {
                    type: 'donut',
                    height: 300,
                    fontFamily: 'Elms Sans, sans-serif'
                },
                colors: ['#2244FF', '#FF4422'],
                series: [{{ $totalLunas }}, {{ $totalBelumLunas }}],
                labels: ['Lunas', 'Belum Lunas'],
                legend: {
                    labels: {
                        colors: '#000',
                        fontFamily: 'Elms Sans, sans-serif',
                        fontSize: '12px'
                    }
                },
                dataLabels: {
                    style: {
                        fontFamily: 'Elms Sans, sans-serif',
                        fontSize: '12px'
                    }
                },
                tooltip: {
                    style: {
                        fontFamily: 'Elms Sans, sans-serif'
                    }
                }
            }
        );

        chartStatus.render();
    </script>


@endsection
