    <div class="modal fade" id="create" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/siswa/create" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Tambah Siswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label class="col-form-label">NIS</label>
                            <input type="number" class="form-control" name="nis" readonly value="{{ $generatedNis }}">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Nama Lengkap">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Kelas</label>
                            <select name="grade_id" class="form-select">
                                <option selected disabled>-- Pilih Kelas --</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }} - {{ $grade->major }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Alamat</label>
                            <textarea class="form-control" name="address" rows="2" autocomplete="off"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Nomor Telepon</label>
                            <input type="number" class="form-control" name="phone_number" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">SPP</label>
                            <select name="fee_id" class="form-select">
                                <option selected disabled>-- Pilih SPP --</option>
                                @foreach ($fees as $fee)
                                    <option value="{{ $fee->id }}">
                                        {{ 'Rp ' . number_format($fee->amount, '0', ',', '.') }} - {{ $fee->year }}
                                    </option>
                                @endforeach
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
