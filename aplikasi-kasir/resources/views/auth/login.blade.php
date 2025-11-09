<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Kasir | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #007bff, #00d4ff);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card h3 {
            font-weight: 700;
            margin-bottom: 10px;
            color: #007bff;
        }

        .login-card p {
            color: #6c757d;
            margin: 1rem 0;
            font-size: 0.75rem;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
        }

        .btn-login {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            margin: 1rem 0;
        }

        .btn-login:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .logo {
            width: 70px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <img src="https://cdn-icons-png.flaticon.com/512/891/891462.png" alt="Logo Kasir" class="logo">
        <h3>Aplikasi Kasir</h3>
        <p>Masuk dengan email dan password anda untuk mengakses semua fitur kami.</p>

        <form action="/login/proses" method="POST">
            @csrf
            <div class="mb-3 text-start">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email" required
                    autocomplete="off">
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" id="password" name="password" class="form-control"
                    placeholder="Masukkan password" required autocomplete="off">
            </div>

            <button type="submit" class="btn btn-login">Masuk</button>
        </form>
    </div>

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