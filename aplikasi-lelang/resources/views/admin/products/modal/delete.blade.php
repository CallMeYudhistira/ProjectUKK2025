@php
    $pict = $product->pict;
    if ($pict == null) {
        $pict = 'photo.png';
    }
@endphp

<div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/admin/barang/delete/{{ $product->id }}" method="post">
            @csrf
            @method('delete')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Hapus Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="product_name"
                            value="{{ $product->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" style="display: block;">Foto Barang</label>
                        <img src="{{ asset('image/product/' . $pict) }}" alt="Foto Barang"
                            style="width: 140px; height: 100px; border-radius: 8px; object-fit: cover;">
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
