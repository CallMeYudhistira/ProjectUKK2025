<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pembayaran SPP</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap');

        body {
            font-family: 'Manrope', sans-serif;
            background-color: #f8f9fa;
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .hero-title {
            font-weight: 700;
        }

        .hero-desc {
            color: #6c757d;
        }

        .feature-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .section-title {
            font-weight: 600;
        }

        footer {
            font-size: 14px;
            color: #6c757d;
        }

        .ft-16 {
            font-size: 16px;
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="hero-title mb-3">Sistem Pembayaran SPP <br> Lebih Cepat & Transparan</h1>
                    <p class="hero-desc mb-4">Aplikasi ini membantu sekolah mengelola pembayaran SPP secara online, aman, dan real-time tanpa proses manual yang rumit.</p>
                    <a href="/login" class="btn btn-primary btn-lg me-2 ft-16">Login Sekarang</a>
                    <a href="#fitur" class="btn btn-outline-secondary btn-lg ft-16">Pelajari Lebih Lanjut</a>
                </div>
                <div class="col-md-6 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135706.png" class="img-fluid" style="max-height: 420px;" alt="SPP Illustration">
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="fitur" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Fitur Utama</h2>
                <p class="text-muted">Dirancang untuk kebutuhan sekolah modern</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card p-4 h-100">
                        <h5 class="mb-3">Manajemen Siswa</h5>
                        <p class="text-muted">Kelola data siswa, kelas, dan status pembayaran dengan mudah.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card p-4 h-100">
                        <h5 class="mb-3">Pembayaran Tepat</h5>
                        <p class="text-muted">Mendukung pembayaran dengan pencatatan otomatis dan akurat.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card p-4 h-100">
                        <h5 class="mb-3">Laporan Real-time</h5>
                        <p class="text-muted">Pantau laporan pembayaran SPP secara transparan dan real-time.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section id="tentang" class="py-5 bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="section-title mb-3">Tentang Aplikasi</h2>
                    <p class="text-muted">Aplikasi berbasis website yang membantu sekolah dan orang tua dalam proses pembayaran SPP secara digital, mengurangi kesalahan administrasi, serta meningkatkan transparansi keuangan.</p>
                </div>
                <div class="col-md-6 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/942/942748.png" class="img-fluid" style="max-height: 300px;" alt="About">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-light">
        <div class="container text-center">
            <p class="mb-0">© 2025 Aplikasi Pembayaran SPP. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
