@php
    $pict = $vehicle->pict;
    if ($pict == null) {
        $pict = 'photo.png';
    }
@endphp

<div class="modal fade" id="delete{{ $vehicle->vehicle_id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/admin/kendaraan/delete/{{ $vehicle->vehicle_id }}" method="post">
            @csrf
            @method('delete')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Hapus Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Kendaraan</label>
                        <input type="text" class="form-control" name="vehicle_name"
                            value="{{ $vehicle->vehicle_name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" style="display: block;">Foto Kendaraan</label>
                        <img src="{{ asset('images/' . $pict) }}" alt="Foto Kendaraan"
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
