<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Cicilan Kendaraan</title>

    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12px;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 5px;
        }

        .sub-title {
            text-align: center;
            font-size: 11px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
        }

        th {
            background: #f2f2f2;
            text-align: center;
        }

        td {
            vertical-align: middle;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 11px;
        }

        .summary {
            margin-top: 15px;
            width: 50%;
        }

        .summary td {
            border: none;
            padding: 3px 5px;
        }
    </style>
</head>

<body>

    <h2>LAPORAN CICILAN KENDARAAN</h2>
    <div class="sub-title">
        Periode :
        {{ \Carbon\Carbon::parse($dari)->translatedFormat('d F Y') }}
        s/d
        {{ \Carbon\Carbon::parse($sampai)->translatedFormat('d F Y') }}
        <br>
        Status : {{ strtoupper($status ?? 'SEMUA') }}
    </div>

    <!-- TABLE DATA -->
    <table>
        <thead>
            <tr>
                <th width="4%">No</th>
                <th width="14%">Tanggal</th>
                <th width="18%">Nasabah</th>
                <th width="16%">Kendaraan</th>
                <th width="10%">Total</th>
                <th width="10%">Sisa</th>
                <th width="8%">Tenor</th>
                <th width="10%">Cicilan / Bln</th>
                <th width="10%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($instalments as $i => $item)
                <tr>
                    <td class="center">{{ $i + 1 }}</td>
                    <td class="center">
                        {{ \Carbon\Carbon::parse($item->tgl_pengajuan)->translatedFormat('d-m-Y') }}
                    </td>
                    <td>{{ $item->nama_nasabah }}</td>
                    <td>
                        {{ $item->nama_kendaraan }} <br>
                        {{ $item->merk_kendaraan }} - {{ $item->tipe_kendaraan }}
                    </td>
                    <td class="right">
                        Rp {{ number_format($item->total, 0, ',', '.') }}
                    </td>
                    <td class="right">
                        Rp {{ number_format($item->sisa, 0, ',', '.') }}
                    </td>
                    <td class="center">
                        {{ $item->waktu }} bln
                    </td>
                    <td class="right">
                        Rp {{ number_format($item->cicilan, 0, ',', '.') }}
                    </td>
                    <td class="center">
                        {{ $item->status_bayar }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- SUMMARY -->
    <table class="summary">
        <tr>
            <td>Total Data</td>
            <td>: {{ $instalments->count() }}</td>
        </tr>
        <tr>
            <td>Total Nilai Kredit</td>
            <td>: Rp {{ number_format($instalments->sum('total'), 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Total Sudah Dibayar</td>
            <td>: Rp {{ number_format($instalments->sum('total_bayar'), 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Total Sisa</td>
            <td>: Rp {{ number_format($instalments->sum('sisa'), 0, ',', '.') }}</td>
        </tr>
    </table>

    <div class="footer">
        Dicetak pada :
        {{ \Carbon\Carbon::now()->translatedFormat('d F Y - H:i') }}
    </div>

</body>

</html>
