<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>💳 Aplikasi Cicilan Kendaraan 💳</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Elms+Sans:ital,wght@0,100..900;1,100..900&display=swap');

        * {
            font-family: 'Elms Sans', sans-serif;
        }

        body {
            scroll-behavior: smooth;
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

        .icon {
            font-size: 3rem;
        }

        .card {
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        footer {
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

    <!-- Hero Section -->
    <section id="home" class="hero d-flex align-items-center text-center">
        <div class="container">
            <h1 class="display-5 fw-bold">Kelola Cicilan Kendaraan Anda Lebih Mudah</h1>
            <p class="lead mt-3 mb-4">Aplikasi berbasis web untuk membantu Anda mengatur, memantau, dan melunasi cicilan
                kendaraan dengan efisien.</p>
            <a href="#fitur" class="btn btn-light btn-lg px-4 me-2">Mulai Sekarang</a>
        </div>
    </section>

    <!-- Fitur -->
    <section id="fitur" class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Fitur Unggulan</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="icon mb-3 text-primary fs-1">💳</div>
                            <h5 class="card-title fw-bold">Kelola Pembayaran</h5>
                            <p class="card-text text-muted">Catat setiap cicilan dan pantau sisa pembayaran kendaraan
                                Anda dengan mudah.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="icon mb-3 text-primary fs-1">📊</div>
                            <h5 class="card-title fw-bold">Laporan Keuangan</h5>
                            <p class="card-text text-muted">Pantau total cicilan, bunga, dan riwayat pembayaran dalam
                                tampilan yang rapi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="icon mb-3 text-primary fs-1">🔔</div>
                            <h5 class="card-title fw-bold">Notifikasi Otomatis</h5>
                            <p class="card-text text-muted">Dapatkan pengingat otomatis sebelum jatuh tempo agar tidak
                                terlambat membayar.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang -->
    <section id="tentang" class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="https://cdn-icons-png.flaticon.com/512/9851/9851278.png" alt="Cicilan"
                        class="img-fluid rounded">
                </div>
                <div class="col-md-6">
                    <h2 class="fw-bold mb-3">Tentang Aplikasi</h2>
                    <p class="text-muted mb-4">Aplikasi ini dirancang untuk mempermudah pengguna dalam mengelola cicilan
                        kendaraan secara digital. Sistem ini juga disusun dengan tampilan yang ramah agar pengguna nyaman dalam penggunaannya.
                    </p>
                    <a href="/login" class="btn btn-primary px-4">Coba Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white text-center">
        <div class="container">
            <p class="mb-0">&copy; 2025 CicilKendaraan. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
