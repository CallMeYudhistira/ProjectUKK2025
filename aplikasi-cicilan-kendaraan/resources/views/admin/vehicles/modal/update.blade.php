<div class="modal fade" id="update{{ $vehicle->vehicle_id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/admin/kendaraan/update/{{ $vehicle->vehicle_id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Ubah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Foto Kendaraan</label>
                        <input type="file" class="form-control" name="pict" accept="*image">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Kendaraan</label>
                        <input type="text" class="form-control" name="vehicle_name" placeholder="Nama Kendaraan" value="{{ $vehicle->vehicle_name }}"
                            autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Merk</label>
                        <input type="text" class="form-control" name="brand" placeholder="Merk" value="{{ $vehicle->brand }}"
                            autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis</label>
                        <select class="form-select" name="type">
                            <option selected disabled>- Pilih Jenis -</option>
                            <option value="motor" {{ $vehicle->type == 'motor' ? 'selected' : '' }}>Motor</option>
                            <option value="mobil" {{ $vehicle->type == 'mobil' ? 'selected' : '' }}>Mobil</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" class="form-control" name="price" min="1" value="{{ $vehicle->price }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun Produksi</label>
                        <input type="number" class="form-control" name="production_year" value="{{ $vehicle->production_year }}">
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
