@extends('layouts.app')
@section('title', 'Dashboard | ' . ucfirst(Auth::user()->role))

@section('content')
    <div class="container my-4 py-4">

        <h3 class="fw-bold mb-3">Selamat Datang, {{ Auth::user()->name }}</h3>

        <div class="alert alert-info mb-4">
            Anda login sebagai <strong class="text-capitalize">{{ Auth::user()->role }}</strong>
        </div>

        <!-- SUMMARY CARDS -->
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <small>Total Siswa</small>
                        <h4 class="fw-bold">{{ $totalStudents }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <small>Sudah Bayar Bulan Ini</small>
                        <h4 class="fw-bold text-success">{{ $paidThisMonth }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <small>Belum Bayar</small>
                        <h4 class="fw-bold text-danger">{{ $unpaidStudents }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <small>Pemasukan Bulan Ini</small>
                        <h4 class="fw-bold">Rp {{ number_format($totalIncomeThisMonth) }}</h4>
                    </div>
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
                    <h6>Pembayaran Bulan Ini</h6>
                    <div id="chartStatus"></div>
                    <div style="height: 172px; padding-top: 4rem;" class="text-center"><h4>🤗😁</h4></div>
                </div>
            </div>
        </div>

        <!-- TRANSAKSI TERAKHIR -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Transaksi Terakhir</h5>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Siswa</th>
                            <th>Bulan</th>
                            <th>Nominal</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latestPayments as $payment)
                            <tr>
                                <td>{{ $payment->student->name ?? '-' }}</td>
                                <td>{{ $payment->month_paid }}</td>
                                <td>Rp {{ number_format($payment->total) }}</td>
                                <td>{{ \Carbon\Carbon::parse($payment->payment_date)->isoformat('dddd MMM Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>

    <script>
        var chartPembayaran = new ApexCharts(
            document.querySelector("#chartPembayaran"), {
                chart: {
                    type: 'bar',
                    height: 400,
                    fontFamily: 'Manrope, sans-serif'
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
                    data: @json($totals)
                }],
                xaxis: {
                    categories: @json($months),
                    labels: {
                        style: {
                            fontFamily: 'Manrope, sans-serif',
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
                            fontFamily: 'Manrope, sans-serif',
                            fontSize: '12px',
                            colors: '#000'
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontFamily: 'Manrope, sans-serif'
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
                    fontFamily: 'Manrope, sans-serif'
                },
                colors: ['#2244FF', '#FF4422'],
                series: [{{ $paidThisMonth }}, {{ $unpaidStudents }}],
                labels: ['Lunas', 'Belum Lunas'],
                legend: {
                    labels: {
                        colors: '#000',
                        fontFamily: 'Manrope, sans-serif',
                        fontSize: '12px'
                    }
                },
                dataLabels: {
                    style: {
                        fontFamily: 'Manrope, sans-serif',
                        fontSize: '12px'
                    }
                },
                tooltip: {
                    style: {
                        fontFamily: 'Manrope, sans-serif'
                    }
                }
            }
        );

        chartStatus.render();
    </script>

@endsection
