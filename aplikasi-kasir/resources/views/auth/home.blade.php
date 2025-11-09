@extends('layouts.app')
@section('title', 'Beranda | Aplikasi Kasir')
@section('content')
    <div class="container my-3 py-5">
        <h3 class="fw-bold mb-4">Selamat Datang, {{ Auth::user()->name }}</h3>

        <!-- Statistik -->
        <div class="row g-3 mb-5">
            <div class="col-md-3 col-sm-6">
                <div class="card-stat bg-warning text-dark">
                    <div>Omset Hari Ini</div>
                    <h2>{{ 'Rp ' . number_format($omset, 0, ',', '.') }}</h2>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card-stat bg-primary">
                    <div>Laba Hari Ini</div>
                    <h2>{{ 'Rp ' . number_format($laba, 0, ',', '.') }}</h2>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card-stat bg-success">
                    <div>Total Transaksi Hari Ini</div>
                    <h2>{{ $transaksi }}</h2>
                </div>
            </div>
            <a class="col-md-3 col-sm-6" href="/produk" style="text-decoration: none;">
                <div class="card-stat bg-danger">
                    <div>Stok Barang Hampir Habis</div>
                    <h2>{{ $stok }}</h2>
                </div>
            </a>
        </div>

        <!-- Tabel Barang -->
        <div class="card-body">
            @if ($dataBulan != null)
                <div class="p-4 my-4 card d-flex">
                    <h5 class="fw-bold mb-3">Data Penjualan Tahun Ini</h5>
                    <div id="chart"></div>
                </div>
            @endif

            <script>
                var options = {
                    series: [{
                            name: 'Total Modal',
                            data: @json($modalBulan)
                        },
                        {
                            name: 'Total Omset',
                            data: @json($omsetBulan)
                        },
                        {
                            name: 'Total Laba',
                            data: @json($labaBulan)
                        }
                    ],
                    chart: {
                        height: 350,
                        type: 'bar',
                    },
                    colors: ['#2244FF', '#FF4422', '#22FF44', '#ABCDEF', '#FEDCBA', '#CBDFAB', 'FFFF00', '00FFFF', 'FF00FF'],
                    plotOptions: {
                        bar: {
                            columnWidth: '45%',
                            distributed: true,
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    legend: {
                        show: false
                    },
                    xaxis: {
                        categories: @json($dataBulan),
                        labels: {
                            style: {
                                colors: ['#000000'],
                                fontSize: '12px',
                                fontFamily: 'Plus Jakarta Sans'
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value.toLocaleString('id-ID', {
                                    style: "currency",
                                    currency: "IDR"
                                });
                            },
                            style: {
                                fontFamily: 'Plus Jakarta Sans'
                            }
                        },
                    },
                };

                var chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();
            </script>
        </div>
    </div>
@endsection
