<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>💻 Aplikasi Kasir 💻</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #0d6efd 30%, #4e9bff);
            color: white;
            padding: 0 15px;
        }

        .hero h1 {
            font-size: 2.5rem;
        }

        .hero p {
            max-width: 600px;
            margin: 0 auto;
        }

        /* Features */
        .features {
            min-height: 100vh;
            padding: 0 15px;
        }

        .feature-box {
            text-align: center;
            padding: 30px;
            border-radius: 15px;
            transition: all 0.3s ease;
            background: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .feature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        /* Demo Section */
        .demo {
            background-color: #fff;
            padding: 80px 0;
            text-align: center;
        }

        .demo img {
            max-width: 90%;
            border-radius: 20px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
        }

        /* Footer */
        footer {
            background-color: #111;
            color: #bbb;
            text-align: center;
            padding: 20px 0;
            margin-top: 60px;
        }

        footer a {
            color: #00d4ff;
            text-decoration: none;
        }

        footer a:hover {
            color: #fff;
        }
    </style>
</head>

<body>

    <!-- Hero Section -->
    <section id="home" class="hero d-flex align-items-center text-center">
        <div class="container">
            <h1 class="display-5 fw-bold">Buat Kelola Transaksi Anda Lebih Mudah!</h1>
            <p class="mt-3 mb-4" style="font-size: 17px;">Aplikasi kasir berbasis web yang cepat, aman, dan mudah digunakan!</p>
            <a href="#features" class="btn btn-light btn-lg px-4 me-2" style="font-size: 16px">Mulai Sekarang</a>
        </div>
    </section>

    <!-- Features -->
    <section id="features" class="features d-flex align-items-center text-center">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Fitur Unggulan</h2>
                <p class="text-muted">Semua yang Anda butuhkan untuk mengelola bisnis Anda.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-box">
                        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828817.png" width="60" class="mb-3"
                            alt="Transaksi">
                        <h5>Transaksi Cepat</h5>
                        <p>Proses transaksi hanya dalam hitungan detik dengan antarmuka yang sederhana.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" width="60" class="mb-3"
                            alt="Laporan">
                        <h5>Laporan Otomatis</h5>
                        <p>Analisis penjualan dan laporan keuangan yang bisa diunduh kapan pun Anda butuh.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <img src="https://cdn-icons-png.flaticon.com/512/565/565547.png" width="60" class="mb-3"
                            alt="Multi Device">
                        <h5>Akses di Mana Saja</h5>
                        <p>Gunakan aplikasi dari laptop, tablet, atau smartphone tanpa perlu instalasi tambahan.</p>
                    </div>
                </div>
            </div>
            <div class="d-flex" style="margin-top: 2rem;">
                <a href="#demo" class="btn btn-primary m-auto fw-semibold px-4">Lihat Demo</a>
            </div>
        </div>
    </section>

    <!-- Demo Section -->
    <section id="demo" class="demo">
        <div class="container my-4">
            <h2 class="fw-bold mb-4">Tampilan Demo Aplikasi</h2>
            <img src="{{ asset('dashboard.png') }}" alt="Demo Aplikasi Kasir">
        </div>
        <a href="/login" class="btn btn-primary m-auto fw-semibold px-4 mt-3">Coba Aplikasi</a>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p style="font-size: 15px; margin-top: 12px;">© 2025 Aplikasi Kasir. Semua Hak Dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
