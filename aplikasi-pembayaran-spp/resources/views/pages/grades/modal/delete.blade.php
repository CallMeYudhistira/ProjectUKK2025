<div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/kelas/delete/{{ $grade->id }}" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Hapus Kelas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('delete')
                    <div class="mb-3">
                        <label class="col-form-label">Nama Kelas</label>
                        <input type="text" class="form-control" name="name" value="{{ $grade->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Kompetensi Keahlian</label>
                        <input type="text" class="form-control" name="major" value="{{ $grade->major }}" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>
            </div>
        </form>
    </div>
</div>
