<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3 sidebar-toggler" type="button">
            <i class="fas fa-bars"></i>
        </button>

        <a class="header-brand d-md-none" href="{{ url('/') }}">
            <i class="fas fa-store-alt"></i> POS
        </a>

        <ul class="header-nav ms-auto">
            <!-- Notifications -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="far fa-bell"></i>
                    <span class="badge rounded-pill bg-danger">5</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg pt-0">
                    <div class="dropdown-header bg-light">
                        <strong>Notifikasi</strong>
                    </div>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                        Stok Semen Gresik menipis
                        <small class="text-muted">5 menit lalu</small>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-shopping-cart text-success me-2"></i>
                        Transaksi baru #TRX001
                        <small class="text-muted">10 menit lalu</small>
                    </a>
                </div>
            </li>

            <!-- User Profile -->
            <li class="nav-item dropdown">
                <a class="nav-link py-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md">
                        <img 
                            src="{{ auth()->user()->photo ? asset('storage/profile/' . auth()->user()->photo) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->nama) . '&size=40&background=3498db&color=fff' }}"
                            class="avatar-img" 
                            alt="{{ auth()->user()->nama }}"
                        >
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-light py-2">
                        <strong>{{ auth()->user()->nama }}</strong>
                        <div class="fw-normal text-muted small">{{ auth()->user()->email ?? 'Administrator' }}</div>
                    </div>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changeAvatarModal">
                        <i class="fas fa-camera me-2"></i> Ganti Foto Profil
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void(0);" id="logout-btn-header">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</header>
