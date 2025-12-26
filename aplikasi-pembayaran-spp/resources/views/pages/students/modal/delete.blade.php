    <div class="modal fade" id="delete{{ $student->nis }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/siswa/delete/{{ $student->nis }}" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Hapus Siswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('delete')
                        <div class="mb-3">
                            <label class="col-form-label">NIS</label>
                            <input type="number" class="form-control" name="nis" readonly value="{{ $student->nis }}">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{ $student->name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Kelas</label>
                            <input type="text" class="form-control" value="{{ $student->grade->name }} - {{ $student->grade->major }}" readonly>
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
