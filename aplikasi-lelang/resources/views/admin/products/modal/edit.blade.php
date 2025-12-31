<div class="modal fade" id="update{{ $product->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/admin/barang/update/{{ $product->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Ubah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Foto Barang</label>
                        <input type="file" class="form-control" name="pict" accept="*image">
                        <small style="color: #999; font-size: 0.8rem; margin: 0.3rem;">Kosongkan jika tidak mengubah foto</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama Barang"
                            value="{{ $product->name }}" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" rows="3" class="form-control">{{ $product->description }}</textarea>
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
