<div class="modal fade" id="change" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ $product->status == 'aktif' ? route('lelang.tutup', $auction) : route('lelang.buka', $product) }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Ubah Status Lelang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($product->status == 'aktif')
                        <div class="alert alert-danger" role="alert">
                            Apakah anda yakin ingin menutup lelang?
                        </div>
                    @else
                        <div class="mb-3">
                            <label class="form-label">Harga Awal</label>
                            <input type="number" class="form-control" name="starting_price" placeholder="Harga Awal"
                                autocomplete="off">
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </div>
        </form>
    </div>
</div>
