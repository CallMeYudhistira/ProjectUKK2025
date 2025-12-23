<div class="modal fade" id="buy{{ $vehicle->vehicle_id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/nasabah/transaksi/kendaraan/beli/{{ $vehicle->vehicle_id }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Beli Kendaraan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    {{-- FOTO --}}
                    <div class="mb-3">
                        <label class="form-label d-block">Foto Kendaraan</label>
                        <img src="{{ asset('images/' . $pict) }}" style="width: 280px; border-radius: 8px;">
                    </div>

                    {{-- HARGA --}}
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" class="form-control" id="price{{ $vehicle->vehicle_id }}" name="price"
                            value="{{ $vehicle->price }}" readonly>
                    </div>

                    {{-- PERIODE CICILAN --}}
                    <div class="mb-3">
                        <label class="form-label">Waktu Cicilan</label>
                        <select class="form-select" id="period{{ $vehicle->vehicle_id }}" name="period_id">
                            <option selected disabled>- Pilih Waktu Cicilan -</option>
                            @foreach ($periods as $period)
                                <option value="{{ $period->period_id }}" data-interest="{{ $period->interest }}"
                                    data-period="{{ $period->time_period }}">
                                    {{ $period->time_period }} Bulan - {{ $period->interest * 100 }}%
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- TOTAL HARGA --}}
                    <div class="mb-3">
                        <label class="form-label">Total Harga</label>
                        <input type="number" class="form-control" id="total{{ $vehicle->vehicle_id }}"
                            name="total_price" readonly>
                    </div>

                    {{-- CICILAN --}}
                    <div class="mb-3">
                        <label class="form-label">Cicilan Per Bulan</label>
                        <input type="number" class="form-control" id="monthly{{ $vehicle->vehicle_id }}"
                            name="monthly_installments" readonly>
                    </div>

                    {{-- KTP --}}
                    <div class="mb-3">
                        <label class="form-label">Foto KTP</label>
                        <input type="file" class="form-control" name="identity_card" accept="image/*">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary" id="submitBtn{{ $vehicle->vehicle_id }}" disabled>
                        Ya
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {

        const pid = "{{ $vehicle->vehicle_id }}";

        const select = document.getElementById("period" + pid);
        const priceInput = document.getElementById("price" + pid);
        const totalInput = document.getElementById("total" + pid);
        const monthlyInput = document.getElementById("monthly" + pid);
        const note = document.getElementById("note" + pid);
        const submitBtn = document.getElementById("submitBtn" + pid);

        select.addEventListener("change", function() {
            const price = parseFloat(priceInput.value);
            const period = parseInt(this.options[this.selectedIndex].dataset.period);
            const interest = parseFloat(this.options[this.selectedIndex].dataset.interest);

            const total = price + (price * interest);
            const monthly = total / period;

            totalInput.value = Math.round(total);
            monthlyInput.value = Math.round(monthly);
            submitBtn.disabled = false;
        });
    });
</script>
