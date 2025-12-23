<div class="modal fade" id="update{{ $period->period_id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/admin/periode/update/{{ $period->period_id }}" method="post">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Ubah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Waktu Periode (Bulan)</label>
                        <input type="number" class="form-control" name="time_period" placeholder="Waktu Periode" value="{{ $period->time_period }}"
                            autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bunga</label>
                        <div class="d-flex">
                            <input type="number" class="form-control" placeholder="Bunga" autocomplete="off" value="{{ $period->interest * 100 }}"
                                id="bunga{{ $period->period_id }}" min="1">
                            <label class="form-label m-2" style="font-size: 16px;">%</label>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" name="interest" id="interest{{ $period->period_id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-warning">Ya</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const bunga{{ $period->period_id }} = document.getElementById('bunga{{ $period->period_id }}');
    const interest{{ $period->period_id }} = document.getElementById('interest{{ $period->period_id }}');

    bunga{{ $period->period_id }}.addEventListener('input', function() {
        decimalInterest = bunga{{ $period->period_id }}.value / 100;
        interest{{ $period->period_id }}.value = decimalInterest;
    });
</script>
