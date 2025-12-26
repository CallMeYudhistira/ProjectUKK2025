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
            text-align: left;
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
    <h2 class="center">LAPORAN PEMBAYARAN SPP</h2>
    <h3 class="center">SMK RAJA PHP FOR REAL</h3>
    <p class="center">Kelas {{ $grade->name }} - {{ $grade->major }}</p>
    <br>
    <!-- Tabel Data Penjualan -->
    <table>
        <thead>
            <tr>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                @foreach ($months as $month)
                    <th scope="col">{{ $month->name }}</th>
                @endforeach
                <th scope="col">Total</th>
                <th scope="col">Tunggakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                @php
                    $totalStudent = 0;
                    $constAmount = $student->fee->amount * 12;
                @endphp

                <tr>
                    <td>{{ $student->nis }}</td>
                    <td>{{ $student->name }}</td>

                    @foreach ($months as $month)
                        @php
                            $pay = $payments->where('nis', $student->nis)->where('month_paid', $month->number)->first();
                        @endphp

                        @if ($pay)
                            <td>Rp {{ number_format($student->fee->amount, 0, ',', '.') }}</td>
                            @php
                                $totalStudent += $student->fee->amount;
                            @endphp
                        @else
                            <td>Rp 0</td>
                        @endif
                    @endforeach

                    @php
                        $debtStudent = $constAmount - $totalStudent;
                    @endphp

                    <td class="bold">Rp {{ number_format($totalStudent, 0, ',', '.') }}</td>
                    <td class="bold">Rp {{ number_format($debtStudent, 0, ',', '.') }}</td>
                </tr>

                @php
                    $totalAll += $totalStudent;
                    $debtAll += $debtStudent;
                @endphp
            @endforeach

            <tr class="bold">
                <td colspan="{{ 2 + count($months) }}" style="text-align:right;">
                    TOTAL KELAS :
                </td>
                <td>
                    Rp {{ number_format($totalAll, 0, ',', '.') }}
                </td>
                <td>
                    Rp {{ number_format($debtAll, 0, ',', '.') }}
                </td>
            </tr>
        </tbody>

    </table>
    <br>

    <div style="text-align: right;">
        <p>Cimahi, {{ \Carbon\Carbon::now()->isoFormat('MMMM Y') }}</p>
        <p style="margin-top: -8px;">Kepala Keuangan</p>
        <br><br><br>
        <p>{{ $admin }}</p>
    </div>

    <div class="footer center">
        <p>Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('l, d M Y - H:i') }}</p>
    </div>
</body>

</html>
