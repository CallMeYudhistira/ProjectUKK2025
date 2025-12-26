<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kartu SPP Siswa</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #e7f0f3;
            padding: 30px;
        }

        .card {
            background: white;
            width: 650px;
            margin: auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);

            transform: scale(0.90);
            transform-origin: top center;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header h1 {
            font-size: 22px;
            margin: 5px 0;
        }

        .header h2 {
            font-size: 17px;
            margin: 0;
        }

        .header p {
            font-size: 13px;
            margin: 2px 0 10px 0;
        }

        hr {
            border: 1px solid black;
            margin: 15px 0;
        }

        .info {
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 1.6;
        }

        .info span {
            display: inline-block;
            width: 110px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: #dbe5ff;
            font-size: 13px;
        }

        th {
            background-color: #7284ff;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 15px;
            border: 1px solid #c2c8e2;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }


        td {
            border: 1px solid #c2c8e2;
            padding: 8px;
            background: #e8edff;
            height: 32px;
        }

        td:first-child {
            font-weight: bold;
            width: 25%;
        }

        @media print {
            body {
                padding: 0;
                background: white;
            }

            .card {
                box-shadow: none;
                width: 90%;
                margin: 0;
                transform: scale(0.90);
                transform-origin: top center;
                page-break-inside: avoid;
            }

            table,
            tr,
            td,
            th {
                page-break-inside: avoid !important;
            }
        }
    </style>
</head>

<body>

    <div class="card">

        <div class="header">
            <h1>KARTU SPP</h1>
            <h2>SMK RAJA PHP FOR REAL</h2>
            <p style="text-transform: capitalize;">JL. PHP FAVORIT AKU MUACH</p>
            <p style="margin-top: -5px;">08404401422400</p>
        </div>

        <hr>

        <div class="info">
            <div><span>NIS</span>: {{ $student->nis }}</div>
            <div><span>Nama</span>: {{ $student->name }}</div>
            <div><span>Kelas</span>: {{ $student->grade->name }} {{ $student->grade->major }}</div>
        </div>

        <table>
            <tr>
                <th>Bulan</th>
                <th>Jumlah</th>
                <th>Tanggal Bayar</th>
                <th>Petugas</th>
            </tr>

            @foreach ($months as $month)
                @php
                    $pays = $payments->firstWhere('month_paid', $month->number);
                @endphp

                @if ($pays)
                    <tr>
                        <td>{{ $month->name }}</td>
                        <td>{{ 'Rp' . number_format($pays->total, '0', ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($pays->payment_date)->isoFormat('DD/MM/Y') }}</td>
                        <td>{{ $pays->user->name }}</td>
                    </tr>
                @else
                    <tr>
                        <td>{{ $month->name }}</td>
                        <td colspan="3" style="text-align:center; font-weight:bold; color:red;">Belum Bayar</td>
                    </tr>
                @endif
            @endforeach
        </table>

    </div>

    <script>
        window.addEventListener("load", function() {
            window.print();
        });
    </script>

</body>

</html>
