<div class="modal fade" id="create" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/admin/periode/create" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Waktu Periode (Bulan)</label>
                        <input type="number" class="form-control" name="time_period" placeholder="Waktu Periode"
                            autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bunga</label>
                        <div class="d-flex">
                            <input type="number" class="form-control" placeholder="Bunga" autocomplete="off"
                                id="bunga" min="1">
                            <label class="form-label m-2" style="font-size: 16px;">%</label>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" name="interest" id="interest">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const bunga = document.getElementById('bunga');
    const interest = document.getElementById('interest');

    bunga.addEventListener('input', function() {
        decimalInterest = bunga.value / 100;
        interest.value = decimalInterest;
    });
</script>
