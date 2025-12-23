<div class="modal fade" id="bayar{{ $instalment->submission_id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/admin/transaksi/cicilan/bayar/{{ $instalment->submission_id }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Bayar Cicilan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" class="form-control" value="{{ $instalment->sisa }}" name="total_price"
                        readonly>
                    <div class="mb-3">
                        <label class="form-label">Sisa Pembayaran</label>
                        <input type="number" class="form-control" value="{{ $instalment->sisa }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cicilan Per Bulan</label>
                        <input type="number" class="form-control" value="{{ $instalment->cicilan }}"
                            name="monthly_installments" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="note" class="form-label">Catatan</label>
                        <textarea class="form-control" name="note" rows="3"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">
                            Ya
                        </button>
                    </div>
                </div>
        </form>
    </div>
</div>
