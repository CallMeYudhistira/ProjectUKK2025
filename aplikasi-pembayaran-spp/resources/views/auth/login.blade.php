<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Pembayaran SPP</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap');

        body {
            font-family: 'Manrope', sans-serif;
            background: linear-gradient(135deg, #0d6efd, #0a58ca);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            padding: 40px;
            width: 100%;
            max-width: 420px;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px;
        }

        .btn-primary {
            border-radius: 12px;
            padding: 12px;
            font-weight: 500;
        }

        .brand {
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        img.logo {
            width: 70px;
            display: block;
            margin: 0 auto 20px auto;
            /* tengah + jarak bawah */
        }
    </style>
</head>

<body>

    <div class="login-card">
        <img src="https://cdn-icons-png.flaticon.com/128/3135/3135706.png" class="logo" alt="SPP Illustration">
        <div class="text-center mb-4">
            <h3 class="brand text-primary">Pembayaran SPP</h3>
            <p class="text-muted">Silakan masuk untuk melanjutkan</p>
        </div>

        <form action="/login/process" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" placeholder="Masukkan username" name="username"
                    autocomplete="off">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Masukkan password" name="password"
                    autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-4">Login</button>
        </form>
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
