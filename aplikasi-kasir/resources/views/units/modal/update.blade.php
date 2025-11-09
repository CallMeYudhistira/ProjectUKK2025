<div class="modal fade" id="update{{ $unit->unit_id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/satuan/update/{{ $unit->unit_id }}" method="post">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Ubah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Satuan</label>
                        <input type="text" class="form-control" name="unit_name" placeholder="Nama Satuan" value="{{ $unit->unit_name }}" autocomplete="off">
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
