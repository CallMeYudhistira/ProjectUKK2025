@extends('layouts.app')
@section('title', 'Dashboard | Masyarakat')

@section('content')

    <div class="container my-4">

        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card p-3">
                    <small>Lelang Aktif</small>
                    <h4>{{ $totalActiveAuctions }}</h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <small>Lelang Diikuti</small>
                    <h4>{{ $totalJoinedAuctions }}</h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <small>Kemenangan</small>
                    <h4>{{ $totalWins }}</h4>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header fw-semibold">
                Aktivitas Penawaran Saya ({{ date('Y') }})
            </div>
            <div class="card-body">
                <div id="bidMonthlyChart"></div>
            </div>
        </div>

        <div class="card">
            <div class="card-header fw-semibold">
                Lelang Aktif
            </div>
            <div class="card-body">
                <div class="row g-3">
                    @forelse ($activeAuctions as $auction)
                        <div class="col-md-4">
                            <div class="card h-100">
                                <img src="{{ asset('image/product/' . $auction->product->pict) }}" class="card-img-top"
                                    style="height:180px; object-fit:cover">
                                <div class="card-body">
                                    <h6>{{ $auction->product->name }}</h6>
                                    <p class="mb-1">Harga Awal: Rp {{ number_format($auction->starting_price) }}</p>
                                    <a href="#" class="btn btn-sm btn-primary w-100">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Belum ada lelang aktif</p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var options = {
                chart: {
                    type: 'bar',
                    height: 300
                },
                series: [{
                    name: 'Jumlah Bid',
                    data: @json(array_values($bidPerMonth))
                }],
                xaxis: {
                    categories: [
                        'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                        'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
                    ]
                },
                dataLabels: {
                    enabled: false
                }
            };

            new ApexCharts(
                document.querySelector("#bidMonthlyChart"),
                options
            ).render();
        });
    </script>

@endsection
