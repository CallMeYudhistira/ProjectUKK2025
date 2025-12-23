<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cicilan | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Elms+Sans:ital,wght@0,100..900;1,100..900&display=swap');

        * {
            font-family: 'Elms Sans', sans-serif;
        }

        /* Background Gradient */
        .auth-bg {
            background: linear-gradient(135deg, #0d6efd, #4e9bff);
            min-height: 100vh;
        }

        /* Card Style */
        .auth-card {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            border-radius: 15px;
        }

        /* Input focus effect */
        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }

        /* Button hover */
        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        /* Smooth transition */
        .card,
        .btn,
        .form-control {
            transition: all 0.3s ease;
        }

        img.logo {
            width: 70px;
            display: block;
            margin: 0 auto 20px auto;
            /* tengah + jarak bawah */
        }
    </style>
</head>

<body class="auth-bg">

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card auth-card shadow-lg border-0">
            <div class="card-body p-5">
                <img src="https://cdn-icons-png.flaticon.com/128/2024/2024259.png" alt="Logo Cicilan Kendaraan"
                    class="logo">
                <h3 class="text-center fw-bold text-primary mb-4">Masuk Akun</h3>

                <form action="/loginProcess" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan email anda"
                            required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan kata sandi"
                            required autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2">Masuk</button>
                </form>

                <p class="text-center mt-4 mb-0 text-muted">
                    Belum punya akun?
                    <a href="/register" class="text-primary fw-semibold text-decoration-none">Daftar Sekarang</a>
                </p>
            </div>
        </div>
    </div>

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
