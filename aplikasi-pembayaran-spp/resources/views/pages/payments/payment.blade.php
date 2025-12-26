@extends('layouts.app')
@section('title', 'Bayar | SPP')
@section('content')
    <div class="container-fluid p-4 mt-3">
        <div class="row g-4">

            <div class="col-lg-6">
                <div class="p-2">
                    <div class="px-2">
                        <h4 class="mb-4 fw-bold">Form Pembayaran SPP</h4>

                        <form action="/transaksi/{{ $student->nis }}/pay" method="post">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">NIS</label>
                                <input type="number" class="form-control" name="nis" readonly
                                    value="{{ $student->nis }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" readonly value="{{ $student->name }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kelas</label>
                                <input type="text" class="form-control" readonly
                                    value="{{ $student->grade->name }} - {{ $student->grade->major }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jumlah Bulan</label>
                                <input type="number" min="1" class="form-control" id="monthCount" max="{{ ($payments->where('nis', $student->nis)->count('nis') - 12) * -1 }}"
                                    placeholder="Masukkan jumlah bulan" name="months_paid">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Daftar Bulan Dibayar</label>
                                <div id="monthList" class="form-control d-flex flex-wrap gap-2 p-2"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Total Bayar</label>
                                <input type="number" class="form-control" id="totalAmount" readonly name="total">
                            </div>

                            <div class="d-flex">
                                <a href="/transaksi" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary mx-2" onclick="return confirm('Yakin melakukan pembayaran?')">Bayar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="p-3">
                    <div class="px-3">
                        <h4 class="mb-4 fw-bold text-center">Status Pembayaran Bulanan</h4>

                        <table class="table table-bordered align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>Bulan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($months as $month)
                                    <tr>
                                        <td>{{ $month->name }}</td>
                                        @if (!$payments->where('nis', $student->nis)->where('month_paid', $month->number)->isEmpty())
                                            <td>✅ Lunas</td>
                                        @else
                                            <td>❌ Belum</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        const monthCountInput = document.getElementById('monthCount');
        const monthList = document.getElementById('monthList');
        const totalAmount = document.getElementById('totalAmount');

        const feePerMonth = {{ $student->fee->amount }};

        // daftar bulan dari backend
        const months = @json($months);

        // bulan yang sudah dibayar
        const paidMonths = @json($payments->where('nis', $student->nis)->pluck('month_paid'));

        monthCountInput.addEventListener('input', function() {
            const count = parseInt(this.value) || 0;
            monthList.innerHTML = '';

            if (count <= 0) {
                totalAmount.value = '';
                return;
            }

            // filter bulan yang belum dibayar
            const unpaidMonths = months.filter(m => !paidMonths.includes(m.number));

            unpaidMonths.slice(0, count).forEach(month => {
                const badge = document.createElement('span');
                badge.className = 'badge rounded-pill bg-success px-3 py-2';
                badge.textContent = month.name;
                monthList.appendChild(badge);
            });

            totalAmount.value = count * feePerMonth;
        });
    </script>
@endsection
