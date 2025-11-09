<div class="modal fade" id="update{{ $product->product_id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/produk/update/{{ $product->product_id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Ubah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Foto Produk</label>
                        <input type="file" class="form-control" name="pict" accept="*image">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="product_name" placeholder="Nama Produk" value="{{ $product->product_name }}" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" name="category_id">
                            <option disabled>- Pilih Kategori -</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}" {{ $category->category_id == $product->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Satuan</label>
                        <select class="form-select" name="unit_id">
                            <option disabled>- Pilih Satuan -</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->unit_id }}" {{ $unit->unit_id == $product->unit_id ? 'selected' : '' }}>{{ $unit->unit_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga Beli</label>
                        <input type="number" class="form-control" name="purchase_price" value="{{ $product->purchase_price }}" min="1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga Jual</label>
                        <input type="number" class="form-control" name="selling_price" value="{{ $product->selling_price }}" min="1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stock" value="{{ $product->stock }}" min="1">
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
