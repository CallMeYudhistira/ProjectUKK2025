<button class="toggle-btn d-md-none">
    <i class="bi bi-list"></i>
</button>

<aside class="sidebar">
    <div class="brand-app">
        <i class="bi bi-cash-coin mx-2"></i> <span>Aplikasi Pembayaran SPP</span>
    </div>

    <ul>
        <hr class="divider">
        <li class="@if (Request::is('beranda')) active @endif" style="margin-top: 2vh;">
            <a href="{{ url('beranda') }}">
                <i class="bi bi-house"></i> Beranda
            </a>
        </li>
        <hr class="divider">
        @if (Auth::user()->role == 'admin')
            <li>
                <a href="#" class="toggle-submenu">
                    <i class="bi bi-archive"></i> Kelola Data
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul class="submenu @if (Request::is('users*') || Request::is('spp*') || Request::is('siswa*') || Request::is('kelas*')) show @endif">
                    <li class="@if (Request::is('users*')) active @endif">
                        <a href="/users"><i class="bi bi-person-circle"></i> Users</a>
                    </li>
                    <li class="@if (Request::is('spp*')) active @endif">
                        <a href="/spp"><i class="bi bi-wallet"></i> SPP</a>
                    </li>
                    <li class="@if (Request::is('kelas*')) active @endif">
                        <a href="/kelas"><i class="bi bi-mortarboard"></i> Kelas</a>
                    </li>
                    <li class="@if (Request::is('siswa*')) active @endif">
                        <a href="/siswa"><i class="bi bi-person-vcard"></i> Siswa</a>
                    </li>
                </ul>
            </li>

            <hr class="divider">
        @endif

        <li>
            <a href="#" class="toggle-submenu">
                <i class="bi bi-receipt"></i> Transaksi
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="submenu @if (Request::is('transaksi*')) show @endif">
                <li class="@if (Request::is('transaksi*')) active @endif">
                    <a href="/transaksi"><i class="bi bi-coin"></i> Pembayaran</a>
                </li>
            </ul>
        </li>

        <hr class="divider">

        <li>
            <a href="#" class="toggle-submenu">
                <i class="bi bi-clipboard-data"></i> Laporan
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="submenu @if (Request::is('laporan*') || Request::is('kartu*')) show @endif">
                <li class="@if (Request::is('laporan*')) active @endif">
                    <a href="/laporan"><i class="bi bi-journal-text"></i> Pembayaran</a>
                </li>
                <li class="@if (Request::is('kartu*')) active @endif">
                    <a href="/kartu"><i class="bi bi-card-text"></i> Kartu</a>
                </li>
            </ul>
        </li>

        <hr class="divider">

        <li class="@if (Request::is('profile')) active @endif">
            <a href="/profile"><i class="bi bi-person-badge"></i> Profile</a>
        </li>

        <hr class="divider">

        <li class="mt-3">
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </li>
    </ul>
</aside>

<script>
    // Sidebar toggle untuk layar kecil
    const toggleBtn = document.querySelector('.toggle-btn');
    const sidebar = document.querySelector('.sidebar');
    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('active');
    });

    // Dropdown submenu + ubah icon chevron
    document.querySelectorAll('.toggle-submenu').forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();
            const submenu = link.nextElementSibling;
            const chevron = link.querySelector('.bi-chevron-down, .bi-chevron-up');

            // toggle submenu
            submenu.classList.toggle('show');

            // ubah icon
            if (submenu.classList.contains('show')) {
                chevron.classList.remove('bi-chevron-down');
                chevron.classList.add('bi-chevron-up');
            } else {
                chevron.classList.remove('bi-chevron-up');
                chevron.classList.add('bi-chevron-down');
            }
        });
    });

    // Saat halaman dimuat, ubah chevron menu yang aktif (jika submenu terbuka by default)
    document.querySelectorAll('.submenu.show').forEach(submenu => {
        const link = submenu.previousElementSibling;
        const chevron = link.querySelector('.bi-chevron-down, .bi-chevron-up');
        chevron.classList.remove('bi-chevron-down');
        chevron.classList.add('bi-chevron-up');
    });
</script>
