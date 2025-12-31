<button class="toggle-btn d-md-none">
    <i class="bi bi-list"></i>
</button>

<aside class="sidebar">
    <div class="brand-app">
        <i class="bi bi-hammer mx-2"></i> <span style="padding-top: 10px;">Aplikasi Lelang</span>
    </div>

    <ul>
        {{-- Admin --}}
        @if (Auth::user()->role == 'admin')
            <li class="@if (Request::is('admin/beranda')) active @endif" style="margin-top: 2vh;">
                <a href="{{ url('admin/beranda') }}">
                    <i class="bi bi-house"></i> Beranda
                </a>
            </li>
            <hr class="divider">
            <li>
                <a href="#" class="toggle-submenu">
                    <i class="bi bi-archive"></i> Kelola Data
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul class="submenu @if (Request::is('admin/users*') || Request::is('admin/barang*')) show @endif">
                    <li class="@if (Request::is('admin/users*')) active @endif">
                        <a href="/admin/users"><i class="bi bi-person-circle"></i> Users</a>
                    </li>
                    <li class="@if (Request::is('admin/barang*')) active @endif">
                        <a href="/admin/barang"><i class="bi bi-box-seam"></i></i> Barang</a>
                    </li>
                </ul>
            </li>

            <hr class="divider">

            <li>
                <a href="#" class="toggle-submenu">
                    <i class="bi bi-receipt"></i> Transaksi
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul class="submenu @if (Request::is('admin/transaksi/*')) show @endif">
                    <li class="@if (Request::is('admin/transaksi/lelang*')) active @endif">
                        <a href="/admin/transaksi/lelang"><i class="bi bi-people"></i> Lelang</a>
                    </li>
                    <li class="@if (Request::is('admin/transaksi/riwayat*')) active @endif">
                        <a href="/admin/transaksi/riwayat"><i class="bi bi-hourglass-split"></i> Riwayat</a>
                    </li>
                </ul>
            </li>

            <hr class="divider">

            <li>
                <a href="#" class="toggle-submenu">
                    <i class="bi bi-clipboard-data"></i> Laporan
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul class="submenu @if (Request::is('admin/laporan*')) show @endif">
                    <li class="@if (Request::is('admin/laporan*')) active @endif">
                        <a href="/admin/laporan"><i class="bi bi-journal-text"></i> Lelang</a>
                    </li>
                </ul>
            </li>

            {{-- masyarakat --}}
        @elseif(Auth::user()->role == 'masyarakat')
            <li class="@if (Request::is('masyarakat/beranda')) active @endif" style="margin-top: 2vh;">
                <a href="{{ url('masyarakat/beranda') }}">
                    <i class="bi bi-house"></i> Beranda
                </a>
            </li>

            <hr class="divider">

            <li>
                <a href="#" class="toggle-submenu">
                    <i class="bi bi-receipt"></i> Transaksi
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul class="submenu @if (Request::is('masyarakat/transaksi/*')) show @endif">
                    <li class="@if (Request::is('masyarakat/transaksi/lelang*')) active @endif">
                        <a href="/masyarakat/transaksi/lelang"><i class="bi bi-people"></i> Lelang</a>
                    </li>
                    <li class="@if (Request::is('masyarakat/transaksi/riwayat*')) active @endif">
                        <a href="/masyarakat/transaksi/riwayat"><i class="bi bi-hourglass-split"></i> Riwayat</a>
                    </li>
                </ul>
            </li>
        @endif

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
