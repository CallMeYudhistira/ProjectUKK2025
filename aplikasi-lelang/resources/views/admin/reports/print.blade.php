<!DOCTYPE html>
<html>

<head>
    <title>Laporan Hasil Lelang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
        }

        th {
            background: #f1f1f1;
        }

        h3 {
            text-align: center;
        }
    </style>
</head>

<body>

    <h3>LAPORAN HASIL LELANG</h3>

    @if ($start && $end)
        <p>Periode: {{ $start }} s/d {{ $end }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Barang</th>
                <th>Harga Awal</th>
                <th>Harga Menang</th>
                <th>Pemenang</th>
                <th>Admin</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($auctions as $i => $auction)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $auction->product->name }}</td>
                    <td>Rp {{ number_format($auction->starting_price) }}</td>
                    <td>Rp {{ number_format($auction->highestBid->bid_price ?? 0) }}</td>
                    <td>{{ $auction->winner->name ?? '-' }}</td>
                    <td>{{ $auction->admin->name }}</td>
                    <td>{{ $auction->created_at->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p style="margin-top:20px;">
        Dicetak pada: {{ now()->format('d M Y H:i') }}
    </p>

    <script>
        window.print();
    </script>

</body>

</html>
