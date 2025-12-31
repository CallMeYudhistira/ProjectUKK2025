<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Lelang</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mona+Sans:ital,wght@0,200..900;1,200..900&display=swap');

        body {
            font-family: 'Mona Sans', sans-serif;
            background-color: #ffffff;
        }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
        }

        .hero-image {
            max-width: 90%;
        }

        /* Feature Card */
        .feature-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        }

        /* CTA Section */
        .cta-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #0d6efd, #0a58ca);
        }

        /* Buttons */
        .btn-primary {
            border-radius: 8px;
        }

        .btn-light {
            border-radius: 8px;
        }

        .feature-icon {
            width: 56px;
            height: 56px;
            padding: 10px;
            background-color: #f1f5ff;
            border-radius: 12px;
        }
    </style>
</head>

<body>

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="fw-bold mb-3">
                        Platform Lelang Online <br>
                        yang Aman & Transparan
                    </h1>
                    <p class="text-muted mb-4">
                        Aplikasi Lelang memudahkan proses lelang secara online dengan sistem
                        yang cepat, transparan, dan mudah digunakan.
                    </p>
                    <a href="/login" class="btn btn-primary btn-lg px-5">
                        Mulai Sekarang
                    </a>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('image/icon/hammer.png') }}" alt="Lelang"
                        class="img-fluid hero-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Section -->
    <section id="fitur" class="bg-light" style="padding: 9rem 0;">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Fitur Unggulan</h2>
                <p class="text-muted">
                    Dirancang untuk memberikan pengalaman lelang terbaik
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card text-center p-4 h-100">
                        <img src="{{ asset('image/icon/hourglass.png') }}" alt="Real Time"
                            class="feature-icon mb-3">
                        <h5 class="fw-semibold mb-3">Lelang Real-Time</h5>
                        <p class="text-muted">
                            Proses penawaran dilakukan secara langsung dan transparan
                            tanpa keterlambatan.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card text-center p-4 h-100">
                        <img src="{{ asset('image/icon/lock.png') }}" alt="Security"
                            class="feature-icon mb-3">
                        <h5 class="fw-semibold mb-3">Keamanan Data</h5>
                        <p class="text-muted">
                            Data pengguna dan transaksi dilindungi dengan sistem
                            keamanan yang andal.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card text-center p-4 h-100">
                        <img src="{{ asset('image/icon/easy-to-use.png') }}" alt="Easy to Use"
                            class="feature-icon mb-3">
                        <h5 class="fw-semibold mb-3">Mudah Digunakan</h5>
                        <p class="text-muted">
                            Antarmuka sederhana dan intuitif, cocok untuk semua pengguna.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section text-center text-white py-5">
        <div class="container py-5">
            <h2 class="fw-bold mb-3">
                Siap Mengikuti Lelang Online?
            </h2>
            <p class="mb-4">
                Bergabung sekarang dan nikmati pengalaman lelang yang modern dan efisien.
            </p>
            <a href="/register" class="btn btn-light btn-lg px-5">
                Daftar Sekarang
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-white border-top">
        <div class="container text-center">
            <small class="text-muted">
                © 2025 Aplikasi Lelang. All rights reserved.
            </small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
