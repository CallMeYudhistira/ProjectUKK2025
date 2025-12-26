<div class="modal fade" id="create" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/kelas/create" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Tambah Kelas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label class="col-form-label">Nama Kelas</label>
                        <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Nama Kelas">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Kompetensi Keahlian</label>
                        <select name="major" class="form-select">
                            <option selected disabled>-- Pilih Kompetensi Keahlian --</option>
                            <option value="RPL">RPL</option>
                            <option value="TEI">TEI</option>
                            <option value="TKJ">TKJ</option>
                            <option value="TPTU">TPTU</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </div>
        </form>
    </div>
</div>
