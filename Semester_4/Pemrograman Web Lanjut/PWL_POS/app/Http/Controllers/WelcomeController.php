<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\UserModel;
use App\Models\PenjualanModel;
use App\Models\PenjualanDetailModel;
use App\Models\SupplierModel;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            'list' => ['Home', 'Dashboard']
        ];

        $activeMenu = 'dashboard';

        // Statistics
        $totalProduk = BarangModel::count();
        $totalKategori = KategoriModel::count();
        $totalSupplier = SupplierModel::count();
        $totalPengguna = UserModel::count();

        // Sales statistics
        $totalTransaksi = PenjualanModel::count();
        $totalRevenue = PenjualanDetailModel::select(DB::raw('SUM(harga * jumlah) as total'))
            ->first()
            ->total ?? 0;

        // Transaction this month
        $transaksiHariIni = PenjualanModel::whereDate('penjualan_tanggal', today())->count();
        $transaksiMingguIni = PenjualanModel::whereBetween('penjualan_tanggal', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ])->count();

        // Top selling products
        $topProducts = PenjualanDetailModel::select('barang_id', DB::raw('SUM(jumlah) as total_terjual'))
            ->groupBy('barang_id')
            ->orderBy('total_terjual', 'DESC')
            ->limit(5)
            ->with('barang')
            ->get();

        // Recent transactions
        $recentTransactions = PenjualanModel::with(['user', 'penjualanDetail'])
            ->orderBy('penjualan_tanggal', 'DESC')
            ->limit(5)
            ->get()
            ->map(function($penjualan) {
                $penjualan->total = $penjualan->penjualanDetail->sum(function($detail) {
                    return $detail->harga * $detail->jumlah;
                });
                return $penjualan;
            });

        // Low stock alert
        $lowStock = DB::table('m_barang as b')
            ->select('b.barang_id', 'b.barang_nama', 
                DB::raw('COALESCE(SUM(s.stok_jumlah), 0) - COALESCE(SUM(pd.jumlah), 0) as stok_tersedia'))
            ->leftJoin('t_stok as s', 'b.barang_id', '=', 's.barang_id')
            ->leftJoin('t_penjualan_detail as pd', 'b.barang_id', '=', 'pd.barang_id')
            ->groupBy('b.barang_id', 'b.barang_nama')
            ->having('stok_tersedia', '<', 10)
            ->orderBy('stok_tersedia', 'ASC')
            ->limit(5)
            ->get();

        return view('welcome', [
            'breadcrumb' => $breadcrumb, 
            'activeMenu' => $activeMenu,
            'totalProduk' => $totalProduk,
            'totalKategori' => $totalKategori,
            'totalSupplier' => $totalSupplier,
            'totalPengguna' => $totalPengguna,
            'totalTransaksi' => $totalTransaksi,
            'totalRevenue' => $totalRevenue,
            'transaksiHariIni' => $transaksiHariIni,
            'transaksiMingguIni' => $transaksiMingguIni,
            'topProducts' => $topProducts,
            'recentTransactions' => $recentTransactions,
            'lowStock' => $lowStock
        ]);
    }
}