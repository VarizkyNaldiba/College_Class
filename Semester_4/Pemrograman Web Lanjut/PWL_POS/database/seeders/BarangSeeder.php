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
            // Kategori Semen & Bahan Baku
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'SMN001', 'barang_nama' => 'Semen Gresik 50kg', 'harga_beli' => 62000, 'harga_jual' => 68000],
            ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'SMN002', 'barang_nama' => 'Semen Padang 40kg', 'harga_beli' => 55000, 'harga_jual' => 60000],
            ['barang_id' => 3, 'kategori_id' => 1, 'barang_kode' => 'PSR001', 'barang_nama' => 'Pasir Beton per m3', 'harga_beli' => 180000, 'harga_jual' => 220000],
            ['barang_id' => 4, 'kategori_id' => 1, 'barang_kode' => 'KRL001', 'barang_nama' => 'Kerikil per m3', 'harga_beli' => 200000, 'harga_jual' => 240000],
            
            // Kategori Besi & Baja
            ['barang_id' => 5, 'kategori_id' => 2, 'barang_kode' => 'BSI001', 'barang_nama' => 'Besi Beton 10mm 12m', 'harga_beli' => 85000, 'harga_jual' => 95000],
            ['barang_id' => 6, 'kategori_id' => 2, 'barang_kode' => 'BSI002', 'barang_nama' => 'Besi Beton 12mm 12m', 'harga_beli' => 115000, 'harga_jual' => 128000],
            ['barang_id' => 7, 'kategori_id' => 2, 'barang_kode' => 'SNG001', 'barang_nama' => 'Seng Gelombang 180cm', 'harga_beli' => 45000, 'harga_jual' => 55000],
            
            // Kategori Pipa & Plumbing
            ['barang_id' => 8, 'kategori_id' => 3, 'barang_kode' => 'PIP001', 'barang_nama' => 'Pipa PVC 3 inch 4m', 'harga_beli' => 48000, 'harga_jual' => 58000],
            ['barang_id' => 9, 'kategori_id' => 3, 'barang_kode' => 'PIP002', 'barang_nama' => 'Pipa PVC 4 inch 4m', 'harga_beli' => 72000, 'harga_jual' => 85000],
            ['barang_id' => 10, 'kategori_id' => 3, 'barang_kode' => 'KRN001', 'barang_nama' => 'Keran Air Kuningan', 'harga_beli' => 35000, 'harga_jual' => 45000],
            
            // Kategori Cat & Finishing
            ['barang_id' => 11, 'kategori_id' => 4, 'barang_kode' => 'CAT001', 'barang_nama' => 'Cat Tembok Putih 25kg', 'harga_beli' => 280000, 'harga_jual' => 320000],
            ['barang_id' => 12, 'kategori_id' => 4, 'barang_kode' => 'CAT002', 'barang_nama' => 'Cat Kayu 1 Liter', 'harga_beli' => 65000, 'harga_jual' => 78000],
            ['barang_id' => 13, 'kategori_id' => 4, 'barang_kode' => 'PLT001', 'barang_nama' => 'Plamir Tembok 25kg', 'harga_beli' => 85000, 'harga_jual' => 98000],
            
            // Kategori Listrik & Instalasi
            ['barang_id' => 14, 'kategori_id' => 5, 'barang_kode' => 'KBL001', 'barang_nama' => 'Kabel NYA 2.5mm 100m', 'harga_beli' => 320000, 'harga_jual' => 360000],
            ['barang_id' => 15, 'kategori_id' => 5, 'barang_kode' => 'STP001', 'barang_nama' => 'Stop Kontak Universal', 'harga_beli' => 12000, 'harga_jual' => 18000],
            ['barang_id' => 16, 'kategori_id' => 5, 'barang_kode' => 'LMP001', 'barang_nama' => 'Lampu LED 12 Watt', 'harga_beli' => 25000, 'harga_jual' => 32000],
            
            // Kategori Keramik & Granit
            ['barang_id' => 17, 'kategori_id' => 6, 'barang_kode' => 'KRM001', 'barang_nama' => 'Keramik Lantai 40x40', 'harga_beli' => 45000, 'harga_jual' => 55000],
            ['barang_id' => 18, 'kategori_id' => 6, 'barang_kode' => 'KRM002', 'barang_nama' => 'Keramik Dinding 25x40', 'harga_beli' => 38000, 'harga_jual' => 48000],
            ['barang_id' => 19, 'kategori_id' => 6, 'barang_kode' => 'GRT001', 'barang_nama' => 'Granit Tile 60x60', 'harga_beli' => 85000, 'harga_jual' => 105000],
            
            // Kategori Kayu & Triplek
            ['barang_id' => 20, 'kategori_id' => 7, 'barang_kode' => 'KYU001', 'barang_nama' => 'Kayu Balok 4x6 4m', 'harga_beli' => 48000, 'harga_jual' => 58000],
            ['barang_id' => 21, 'kategori_id' => 7, 'barang_kode' => 'TPL001', 'barang_nama' => 'Triplek 4mm 122x244', 'harga_beli' => 68000, 'harga_jual' => 82000],
            ['barang_id' => 22, 'kategori_id' => 7, 'barang_kode' => 'TPL002', 'barang_nama' => 'Triplek 9mm 122x244', 'harga_beli' => 115000, 'harga_jual' => 135000],
        ];

        DB::table('m_barang')->insert($data);
    }
}
