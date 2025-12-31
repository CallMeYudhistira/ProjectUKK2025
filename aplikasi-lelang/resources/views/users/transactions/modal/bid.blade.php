<div class="modal fade" id="bid" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('lelang.bid', $auction) }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Ajukan Nominal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nominal</label>
                        <input type="number" class="form-control" name="bid_price" placeholder="Nominal"
                            autocomplete="off">
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
