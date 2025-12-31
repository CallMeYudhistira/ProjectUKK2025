<div class="modal fade" id="update{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/admin/users/update/{{ $user->id }}" method="post">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Ubah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama Lengkap"
                            value="{{ $user->name }}" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username"
                            value="{{ $user->username }}" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Password" value=""
                            autocomplete="off">
                        <small style="color: #999; font-size: 0.8rem;">Kosongkan jika tidak mengubah password</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hak Akses</label>
                        <select class="form-select" name="role">
                            <option disabled>- Pilih Hak Akses -</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="masyarakat" {{ $user->role == 'masyarakat' ? 'selected' : '' }}>Masyarakat
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Telepon</label>
                        <input type="number" class="form-control" name="phone_number" placeholder="Nomor Telepon"
                            value="{{ $user->phone_number }}" autocomplete="off">
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
