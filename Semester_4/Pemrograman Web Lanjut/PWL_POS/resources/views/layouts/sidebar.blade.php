<div class="sidebar sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-flex align-items-center justify-content-center">
        <i class="fas fa-store-alt fa-2x text-white me-2"></i>
        <span class="text-white fw-bold">POS Toko Bangunan</span>
    </div>

    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link {{ ($activeMenu == 'dashboard') ? 'active' : '' }}" href="{{ url('/') }}">
                <i class="nav-icon fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>

        <!-- Data Pengguna -->
        @if(auth()->user()->level->level_kode == 'Adm')
        <li class="nav-title">Data Pengguna</li>
        <li class="nav-item">
            <a class="nav-link {{ ($activeMenu == 'level') ? 'active' : '' }}" href="{{ url('/level') }}">
                <i class="nav-icon fas fa-layer-group"></i> Level User
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ ($activeMenu == 'user') ? 'active' : '' }}" href="{{ url('/user') }}">
                <i class="nav-icon far fa-user"></i> Data User
            </a>
        </li>
        @endif

        <!-- Data Barang -->
        <li class="nav-title">Data Barang</li>
        <li class="nav-item">
            <a class="nav-link {{ ($activeMenu == 'kategori') ? 'active' : '' }}" href="{{ url('/kategori') }}">
                <i class="nav-icon far fa-bookmark"></i> Kategori Barang
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ ($activeMenu == 'barang') ? 'active' : '' }}" href="{{ url('/barang') }}">
                <i class="nav-icon far fa-list-alt"></i> Data Barang
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ ($activeMenu == 'supplier') ? 'active' : '' }}" href="{{ url('/supplier') }}">
                <i class="nav-icon fas fa-truck"></i> Data Supplier
            </a>
        </li>

        <!-- Data Transaksi -->
        <li class="nav-title">Data Transaksi</li>
        <li class="nav-item">
            <a class="nav-link {{ ($activeMenu == 'stok') ? 'active' : '' }}" href="{{ url('/stok') }}">
                <i class="nav-icon fas fa-cubes"></i> Stok Barang
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ ($activeMenu == 'penjualan') ? 'active' : '' }}" href="{{ url('/penjualan') }}">
                <i class="nav-icon fas fa-cash-register"></i> Transaksi Penjualan
            </a>
        </li>

        <!-- Logout -->
        <li class="nav-divider mt-4"></li>
        <li class="nav-item mt-3">
            <a href="javascript:void(0);" class="nav-link text-danger" id="logout-btn">
                <i class="nav-icon fas fa-sign-out-alt"></i> Logout
            </a>
        </li>
    </ul>

    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>