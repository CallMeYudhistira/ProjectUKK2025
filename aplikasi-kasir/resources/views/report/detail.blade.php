<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan | Invoice</title>
    <style>
        /* ====== STYLE DASAR (PENGGANTI BOOTSTRAP) ====== */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Courier New', monospace;
            font-size: 13px;
            color: #212529;
            background-color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .card {
            max-width: 300px;
            margin: auto;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 24px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h4 {
            font-weight: bold;
            text-transform: uppercase;
            margin: 0;
        }

        .text-center {
            text-align: center;
        }

        .text-end {
            text-align: right;
        }

        .fw-bold {
            font-weight: bold;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .text-muted {
            color: #6c757d;
        }

        .small {
            font-size: 13px;
        }

        .mb-0 {
            margin-bottom: 0 !important;
        }

        .mb-1 {
            margin-bottom: 4px !important;
        }

        .mb-3 {
            margin-bottom: 16px !important;
        }

        .mt-3 {
            margin-top: 16px !important;
        }

        .shadow {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .p-4 {
            padding: 24px !important;
        }

        hr {
            border: 0;
            border-top: 1px solid #dee2e6;
            margin: 12px 0;
        }

        /* ====== TABEL ====== */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            padding: 4px 0;
            vertical-align: top;
        }

        .table-borderless td {
            border: none;
        }

        /* ====== WARNA DAN FONT TAMBAHAN ====== */
        .text-muted {
            color: #6c757d !important;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container py-5 d-flex justify-content-center" style="display: flex; justify-content: center;">
        <div class="card shadow p-4" style="font-family: 'Courier New', monospace; background-color: #fff; border: 1px solid #dee2e6; border-radius: 8px; padding: 24px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            <div class="text-center mb-1" style="text-align: center; margin-bottom: 4px;">
                <h4 class="fw-bold text-uppercase" style="font-weight: bold; text-transform: uppercase; margin: 0;">Aplikasi Kasir</h4>
            </div>

            <hr style="border: 0; border-top: 1px solid #dee2e6; margin: 12px 0;">

            <div class="small" style="font-size: 13px;">
                <p><strong>Order</strong> #{{ $transaction->transaction_id }}</p>
                <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($transaction->date)->isoFormat('dddd, DD MM Y') }}</p>
            </div>

            <hr style="border: 0; border-top: 1px solid #dee2e6; margin: 12px 0;">

            <table class="table table-borderless small mb-0" style="width: 100%; border-collapse: collapse; font-size: 13px; margin-bottom: 0;">
                @foreach ($transaction_details as $detail)
                    <tr>
                        <td style="padding-top: 0.6rem;">{{ $detail->product_name }}</td>
                    </tr>
                    <tr>
                        <td style="width: fit-content;">{{ 'Rp ' . number_format($detail->selling_price, 0, ',', '.') }}</td>
                        <td>x {{ $detail->quantity }} {{ $detail->unit_name }}</td>
                        <td class="text-end" style="text-align: right;">{{ 'Rp ' . number_format($detail->subtotal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </table>

            <hr style="border: 0; border-top: 1px solid #dee2e6; margin: 12px 0;">

            <table class="table table-borderless small mb-0" style="width: 100%; border-collapse: collapse; font-size: 13px; margin-bottom: 0;">
                <tr>
                    <td>Total</td>
                    <td class="text-end" style="text-align: right;">Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Bayar</td>
                    <td class="text-end" style="text-align: right;">Rp {{ number_format($transaction->paid, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Kembali</td>
                    <td class="text-end" style="text-align: right;">Rp {{ number_format($transaction->change, 0, ',', '.') }}</td>
                </tr>
            </table>

            <hr style="border: 0; border-top: 1px solid #dee2e6; margin: 12px 0;">

            <p class="small text-end mb-1" style="font-size: 13px; text-align: right; margin-bottom: 4px;">Kasir: {{ $transaction->name }}</p>

            <div class="text-center mt-3 small" style="text-align: center; margin-top: 16px; font-size: 13px;">
                <p class="mb-0" style="margin-bottom: 0;">Terima kasih telah berbelanja.</p>
                <p class="text-muted" style="color: #6c757d;">- Have a nice day! -</p>
            </div>
        </div>
    </div>
</body>

</html>
