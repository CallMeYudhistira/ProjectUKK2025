@extends('layouts.app')
@section('title', 'Dashboard Admin')

@section('content')
    <div class="container my-5">

        <h4 class="fw-bold mb-4">Dashboard Admin</h4>

        <!-- SUMMARY -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card p-3 shadow-sm">
                    <small>Total Lelang</small>
                    <h4 class="fw-bold">{{ $totalAuctions }}</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3 shadow-sm">
                    <small>Lelang Dibuka</small>
                    <h4 class="fw-bold text-success">{{ $openAuctions }}</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3 shadow-sm">
                    <small>Lelang Ditutup</small>
                    <h4 class="fw-bold text-danger">{{ $closedAuctions }}</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3 shadow-sm">
                    <small>Total Barang</small>
                    <h4 class="fw-bold">{{ $totalProducts }}</h4>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header fw-semibold">
                Statistik Status Lelang
            </div>
            <div class="card-body">
                <div id="auctionStatusChart"></div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header fw-semibold">
                Jumlah Lelang per Bulan ({{ date('Y') }})
            </div>
            <div class="card-body">
                <div id="auctionMonthlyChart"></div>
            </div>
        </div>

        <!-- LELANG AKTIF -->
        <div class="card mb-4">
            <div class="card-header fw-semibold">
                Lelang Sedang Berjalan
            </div>
            <div class="card-body p-0">
                <table class="table mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Barang</th>
                            <th>Harga Awal</th>
                            <th>Bid Tertinggi</th>
                            <th>Peserta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($activeAuctions as $auction)
                            <tr>
                                <td>{{ $auction->product->name }}</td>
                                <td>Rp {{ number_format($auction->starting_price) }}</td>
                                <td>
                                    Rp {{ number_format($auction->highestBid->bid_price ?? 0) }}
                                </td>
                                <td>{{ $auction->bids()->count() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">
                                    Tidak ada lelang aktif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- LELANG SELESAI -->
        <div class="card">
            <div class="card-header fw-semibold">
                Lelang Terakhir Ditutup
            </div>
            <div class="card-body p-0">
                <table class="table mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Barang</th>
                            <th>Pemenang</th>
                            <th>Harga Menang</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($closedRecent as $auction)
                            <tr>
                                <td>{{ $auction->product->name }}</td>
                                <td>{{ $auction->winner->name ?? '-' }}</td>
                                <td>
                                    Rp {{ number_format($auction->highestBid->bid_price ?? 0) }}
                                </td>
                                <td>{{ $auction->updated_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">
                                    Belum ada lelang ditutup
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var options = {
                chart: {
                    type: 'donut',
                    height: 320
                },
                labels: ['Lelang Dibuka', 'Lelang Ditutup'],
                series: [
                    {{ $auctionStatus['dibuka'] }},
                    {{ $auctionStatus['ditutup'] }}
                ],
                legend: {
                    position: 'bottom'
                },
                dataLabels: {
                    enabled: true
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            height: 260
                        }
                    }
                }]
            };

            var chart = new ApexCharts(
                document.querySelector("#auctionStatusChart"),
                options
            );
            chart.render();
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var options = {
                chart: {
                    type: 'bar',
                    height: 350
                },
                series: [{
                    name: 'Jumlah Lelang',
                    data: @json(array_values($auctionPerMonth))
                }],
                xaxis: {
                    categories: [
                        'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                        'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
                    ]
                },
                plotOptions: {
                    bar: {
                        borderRadius: 6,
                        columnWidth: '50%'
                    }
                },
                dataLabels: {
                    enabled: false
                },
                yaxis: {
                    title: {
                        text: 'Total Lelang'
                    }
                }
            };

            var chart = new ApexCharts(
                document.querySelector("#auctionMonthlyChart"),
                options
            );
            chart.render();
        });
    </script>

@endsection
