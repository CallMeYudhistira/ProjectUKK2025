<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Aplikasi Lelang</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Mona+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>

    <div class="auth-container">
        <div class="auth-card">
            <img src="{{ asset('image/icon/hammer.png') }}" class="logo" alt="Auction Illustration">
            <h3 class="fw-bold text-center mb-2">Aplikasi Lelang</h3>
            <p class="text-muted text-center mb-4">Masuk ke akun Anda</p>

            <form action="/login/process" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off">
                </div>

                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="********" autocomplete="off">
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-3">
                    Masuk
                </button>

                <p class="text-center text-muted mb-0">
                    Belum punya akun?
                    <a href="/register" class="text-decoration-none fw-semibold">
                        Daftar
                    </a>
                </p>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($errors->any())
        <script>
            let errorList = `
            <ul style="text-align:center; margin:0; padding-left:20px;">
                @foreach ($errors->all() as $error)
                    <li class="text-center" style="list-style-type: none;">{{ $error }}</li>
                @endforeach
            </ul>
        `;

            Swal.fire({
                icon: 'error',
                title: 'Validasi Gagal!',
                html: errorList,
                confirmButtonColor: '#007bff',
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
                confirmButtonColor: '#007bff',
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                confirmButtonColor: '#007bff',
            });
        </script>
    @endif

</body>

</html>
