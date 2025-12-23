<div class="modal fade" id="editStatus{{ $instalment->submission_id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/admin/transaksi/cicilan/edit/{{ $instalment->submission_id }}" method="post">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Ubah Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="alert alert-danger">
                        <span id="statusLabel{{ $instalment->submission_id }}" style="font-weight: bold; text-transform: capitalize;"></span>
                        pengajuan ini?
                    </div>

                    <input type="hidden" name="status" id="status{{ $instalment->submission_id }}">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>

            </div>
        </form>
    </div>
</div>

