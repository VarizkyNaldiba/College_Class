@extends('layouts.template')

@section('content')
<div class="row g-3 mb-4">
    <!-- Total Produk -->
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-primary">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="fs-6 fw-semibold">Total Produk</div>
                    <div class="fs-2 fw-bold">{{ $totalProduk }}</div>
                    <div class="small opacity-75">Item tersedia</div>
                </div>
                <div class="fs-1">
                    <i class="fas fa-boxes"></i>
                </div>
            </div>
            <div class="card-footer text-white-50 d-flex justify-content-between">
                <a href="{{ url('/barang') }}" class="text-white text-decoration-none">Lihat Detail</a>
                <i class="fas fa-arrow-right"></i>
            </div>
        </div>
    </div>

    <!-- Total Kategori -->
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-success">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="fs-6 fw-semibold">Kategori</div>
                    <div class="fs-2 fw-bold">{{ $totalKategori }}</div>
                    <div class="small opacity-75">Kategori produk</div>
                </div>
                <div class="fs-1">
                    <i class="fas fa-tags"></i>
                </div>
            </div>
            <div class="card-footer text-white-50 d-flex justify-content-between">
                <a href="{{ url('/kategori') }}" class="text-white text-decoration-none">Lihat Detail</a>
                <i class="fas fa-arrow-right"></i>
            </div>
        </div>
    </div>

    <!-- Total Supplier -->
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-warning">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="fs-6 fw-semibold">Supplier</div>
                    <div class="fs-2 fw-bold">{{ $totalSupplier }}</div>
                    <div class="small opacity-75">Supplier aktif</div>
                </div>
                <div class="fs-1">
                    <i class="fas fa-truck"></i>
                </div>
            </div>
            <div class="card-footer text-white-50 d-flex justify-content-between">
                <a href="{{ url('/supplier') }}" class="text-white text-decoration-none">Lihat Detail</a>
                <i class="fas fa-arrow-right"></i>
            </div>
        </div>
    </div>

    <!-- Total User -->
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-danger">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="fs-6 fw-semibold">Pengguna</div>
                    <div class="fs-2 fw-bold">{{ $totalPengguna }}</div>
                    <div class="small opacity-75">User terdaftar</div>
                </div>
                <div class="fs-1">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <div class="card-footer text-white-50 d-flex justify-content-between">
                <a href="{{ url('/user') }}" class="text-white text-decoration-none">Lihat Detail</a>
                <i class="fas fa-arrow-right"></i>
            </div>
        </div>
    </div>
</div>

<!-- Sales Statistics Row -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-lg-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="small opacity-75">Total Transaksi</div>
                        <div class="fs-3 fw-bold">{{ $totalTransaksi }}</div>
                    </div>
                    <div class="fs-1"><i class="fas fa-shopping-cart"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="small opacity-75">Total Revenue</div>
                        <div class="fs-5 fw-bold">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
                    </div>
                    <div class="fs-1"><i class="fas fa-dollar-sign"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="small opacity-75">Transaksi Hari Ini</div>
                        <div class="fs-3 fw-bold">{{ $transaksiHariIni }}</div>
                    </div>
                    <div class="fs-1"><i class="fas fa-calendar-day"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="small opacity-75">Transaksi Minggu Ini</div>
                        <div class="fs-3 fw-bold">{{ $transaksiMingguIni }}</div>
                    </div>
                    <div class="fs-1"><i class="fas fa-calendar-week"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <!-- Top Selling Products -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-chart-line"></i> Top 5 Produk Terlaris</h5>
            </div>
            <div class="card-body">
                @if($topProducts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th class="text-center">Total Terjual</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($topProducts as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->barang->barang_nama ?? '-' }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-success">{{ $item->total_terjual }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info mb-0">
                        <i class="fas fa-info-circle"></i> Belum ada data penjualan
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Recent Transactions -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="fas fa-receipt"></i> Transaksi Terbaru</h5>
            </div>
            <div class="card-body">
                @if($recentTransactions->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Pembeli</th>
                                    <th>Tanggal</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentTransactions as $trans)
                                    <tr>
                                        <td><code>{{ $trans->penjualan_kode }}</code></td>
                                        <td>{{ $trans->pembeli }}</td>
                                        <td><small>{{ date('d/m H:i', strtotime($trans->penjualan_tanggal)) }}</small></td>
                                        <td class="text-end"><strong>Rp {{ number_format($trans->total, 0, ',', '.') }}</strong></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-2">
                        <a href="{{ url('/penjualan') }}" class="btn btn-sm btn-outline-success">Lihat Semua Transaksi <i class="fas fa-arrow-right"></i></a>
                    </div>
                @else
                    <div class="alert alert-info mb-0">
                        <i class="fas fa-info-circle"></i> Belum ada transaksi
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Low Stock Alert -->
@if($lowStock->count() > 0)
<div class="row g-3 mt-3">
    <div class="col-12">
        <div class="card border-warning">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0"><i class="fas fa-exclamation-triangle"></i> Peringatan Stok Rendah</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th class="text-center">Stok Tersedia</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lowStock as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->barang_nama }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-{{ $item->stok_tersedia <= 0 ? 'danger' : 'warning' }}">
                                            {{ $item->stok_tersedia }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        @if($item->stok_tersedia <= 0)
                                            <span class="text-danger"><i class="fas fa-times-circle"></i> Habis</span>
                                        @else
                                            <span class="text-warning"><i class="fas fa-exclamation-circle"></i> Stok Rendah</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-2">
                    <a href="{{ url('/stok') }}" class="btn btn-sm btn-outline-warning">Kelola Stok <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Quick Actions -->
<div class="row g-3 mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0"><i class="fas fa-bolt"></i> Aksi Cepat</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <a href="{{ url('/penjualan') }}" class="btn btn-primary w-100 btn-lg">
                            <i class="fas fa-cash-register fa-2x d-block mb-2"></i>
                            <span>Buat Transaksi Baru</span>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ url('/barang') }}" class="btn btn-success w-100 btn-lg">
                            <i class="fas fa-box fa-2x d-block mb-2"></i>
                            <span>Kelola Barang</span>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ url('/stok') }}" class="btn btn-warning w-100 btn-lg">
                            <i class="fas fa-warehouse fa-2x d-block mb-2"></i>
                            <span>Kelola Stok</span>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ url('/supplier') }}" class="btn btn-info w-100 btn-lg">
                            <i class="fas fa-truck fa-2x d-block mb-2"></i>
                            <span>Kelola Supplier</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
<style>
    .card {
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    .fs-1 {
        font-size: 3rem !important;
        opacity: 0.5;
    }
    .btn-lg {
        padding: 1.5rem;
    }
    .btn-lg i {
        opacity: 0.8;
    }
    code {
        background: #f8f9fa;
        padding: 2px 6px;
        border-radius: 3px;
        color: #e83e8c;
    }
</style>
@endpush

