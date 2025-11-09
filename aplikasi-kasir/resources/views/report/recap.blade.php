<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan | PDF</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
            color: #000;
            margin: 20px;
        }

        .header {
            width: 100%;
            margin-bottom: 10px;
        }

        table.header tr td {
            border: none;
        }

        .header td {
            padding: 2px 4px;
            vertical-align: top;
        }

        .header-title {
            font-weight: bold;
            text-transform: uppercase;
        }

        .center {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border-bottom: 1px solid #000;
            padding: 5px 4px;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .no-border td {
            border: none;
            padding: 3px 4px;
        }

        .bold {
            font-weight: bold;
        }

        .totals td {
            border-top: 1px solid #000;
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
        }

        @page {
            margin: 20px;
        }
    </style>
</head>

<body>
    <h2 class="center">LAPORAN PENJUALAN</h2>
    <br>
    <br>
    <table class="header">
        <tr>
            <td class="header-title">Periode :</td>
            <td>{{ \Carbon\Carbon::parse($dari)->translatedFormat('l, d/F/Y') }}</td>
            <td class="header-title">Sampai :</td>
            <td>{{ \Carbon\Carbon::parse($sampai)->translatedFormat('l, d/F/Y') }}</td>
        </tr>
    </table>
    <br>
    <!-- Tabel Data Penjualan -->
    <table>
        <thead>
            <tr>
                <th style="width: 5%;" class="center">No.</th>
                <th class="center" style="width: 18%;">Tanggal</th>
                <th class="center">Modal</th>
                <th class="center">Laba</th>
                <th class="center">Total</th>
                <th class="center">Bayar</th>
                <th class="center">Kembalian</th>
                <th class="center">Nama Kasir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td class="center">#{{ $transaction->transaction_id }}</td>
                <td class="center">{{ \Carbon\Carbon::parse($transaction->date)->translatedFormat('d-M-Y') }}</td>
                <td class="center">{{ number_format($transaction->modal, 0, ',', '.') }}</td>
                <td class="center">{{ number_format($transaction->laba, 0, ',', '.') }}</td>
                <td class="center">{{ number_format($transaction->total, 0, ',', '.') }}</td>
                <td class="center">{{ number_format($transaction->paid, 0, ',', '.') }}</td>
                <td class="center">{{ number_format($transaction->kembali, 0, ',', '.') }}</td>
                <td class="center">{{ $transaction->name }}</td>
            </tr>
            @endforeach

            <tr class="totals">
                <td class="center" colspan="2">Total :</td>
                <td class="center">{{ number_format($transactions->sum('modal'), 0, ',', '.') }}</td>
                <td class="center">{{ number_format($transactions->sum('laba'), 0, ',', '.') }}</td>
                <td class="center">{{ number_format($transactions->sum('total'), 0, ',', '.') }}</td>
                <td class="center">{{ number_format($transactions->sum('paid'), 0, ',', '.') }}</td>
                <td class="center">{{ number_format($transactions->sum('kembali'), 0, ',', '.') }}</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <br>
    <div class="footer center">
        <p>Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('l, d M Y - H:i') }}</p>
    </div>
</body>

</html>
