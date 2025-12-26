<div class="modal fade" id="update{{ $fee->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/spp/update/{{ $fee->id }}" method="post">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Ubah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Tahun Ajaran</label>
                        <input type="number" class="form-control" name="year" placeholder="Tahun" autocomplete="off" value="{{ $fee->year }}" max="{{ now()->format('Y') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nominal</label>
                        <input type="number" class="form-control" name="amount" placeholder="Nominal" autocomplete="off" value="{{ $fee->amount }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-warning">Ya</button>
                </div>
            </div>
        </form>
    </div>
</div>
