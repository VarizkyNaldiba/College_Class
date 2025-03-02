<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'TV001', 'barang_nama' => 'Televisi', 'harga_beli' => 2000000, 'harga_jual' => 2500000],
            ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'HP002', 'barang_nama' => 'Handphone', 'harga_beli' => 1500000, 'harga_jual' => 1800000],
            ['barang_id' => 3, 'kategori_id' => 2, 'barang_kode' => 'KSG003', 'barang_nama' => 'Kaus Garis', 'harga_beli' => 50000, 'harga_jual' => 75000],
            ['barang_id' => 4, 'kategori_id' => 2, 'barang_kode' => 'CJK004', 'barang_nama' => 'Celana Jeans', 'harga_beli' => 120000, 'harga_jual' => 150000],
            ['barang_id' => 5, 'kategori_id' => 3, 'barang_kode' => 'RSM005', 'barang_nama' => 'Roti Sobek', 'harga_beli' => 8000, 'harga_jual' => 12000],
            ['barang_id' => 6, 'kategori_id' => 3, 'barang_kode' => 'MRT006', 'barang_nama' => 'Mie Ramen', 'harga_beli' => 15000, 'harga_jual' => 20000],
            ['barang_id' => 7, 'kategori_id' => 4, 'barang_kode' => 'SKL007', 'barang_nama' => 'Susu Kotak', 'harga_beli' => 5000, 'harga_jual' => 8000],
            ['barang_id' => 8, 'kategori_id' => 4, 'barang_kode' => 'TLR008', 'barang_nama' => 'Teh Lemon', 'harga_beli' => 7000, 'harga_jual' => 10000],
            ['barang_id' => 9, 'kategori_id' => 5, 'barang_kode' => 'PNC009', 'barang_nama' => 'Pensil', 'harga_beli' => 2000, 'harga_jual' => 5000],
            ['barang_id' => 10, 'kategori_id' => 5, 'barang_kode' => 'BKU010', 'barang_nama' => 'Buku Tulis', 'harga_beli' => 5000, 'harga_jual' => 9000],
        ];

        DB::table('m_barang')->insert($data);
    }
}
