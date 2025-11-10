<button class="toggle-btn d-md-none">
    <i class="bi bi-list"></i>
</button>

<aside class="sidebar">
    <div class="brand">
        <i class="bi bi-box-seam mx-2"></i> Aplikasi Kasir
    </div>

    <ul>
        <li class="@if (Request::is('beranda')) active @endif" style="margin-top: 2vh;">
            <a href="{{ url('beranda') }}">
                <i class="bi bi-house"></i> Beranda
            </a>
        </li>

        @if (Auth::user()->role == 'admin')
            <hr class="divider">

            <li>
                <a href="#" class="toggle-submenu">
                    <i class="bi bi-archive"></i> Kelola Data
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul class="submenu 
            @if (Request::is('users*') || Request::is('kategori*') || Request::is('satuan*') || Request::is('produk*')) show @endif">
                    <li class="@if (Request::is('users*')) active @endif">
                        <a href="/users"><i class="bi bi-person-circle"></i> Users</a>
                    </li>
                    <li class="@if (Request::is('kategori*')) active @endif">
                        <a href="/kategori"><i class="bi bi-tags"></i> Kategori</a>
                    </li>
                    <li class="@if (Request::is('satuan*')) active @endif">
                        <a href="/satuan"><i class="bi bi-box2"></i> Satuan</a>
                    </li>
                    <li class="@if (Request::is('produk*')) active @endif">
                        <a href="/produk"><i class="bi bi-boxes"></i> Produk</a>
                    </li>
                </ul>
            </li>
        @endif

        <hr class="divider">

        <li>
            <a href="#" class="toggle-submenu">
                <i class="bi bi-receipt"></i> Transaksi
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="submenu @if (Request::is('transaksi*')) show @endif">
                <li class="@if (Request::is('transaksi*')) active @endif">
                    <a href="/transaksi"><i class="bi bi-cart"></i> Penjualan</a>
                </li>
            </ul>
        </li>

        <hr class="divider">

        <li>
            <a href="#" class="toggle-submenu">
                <i class="bi bi-clipboard-data"></i> Laporan
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="submenu @if (Request::is('laporan*')) show @endif">
                <li class="@if (Request::is('laporan*')) active @endif">
                    <a href="/laporan"><i class="bi bi-journal-text"></i> Penjualan</a>
                </li>
            </ul>
        </li>

        <hr class="divider">

        <li>
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
