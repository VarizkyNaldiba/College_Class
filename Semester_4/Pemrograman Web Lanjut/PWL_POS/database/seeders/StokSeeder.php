<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tanggalSekarang = Carbon::now(); // Ambil tanggal dan waktu sekarang

        $data = [
            ['barang_id' => 1, 'stok_jumlah' => 50, 'user_id' => 1, 'supplier_id' => 1, 'stok_tanggal' => $tanggalSekarang],
            ['barang_id' => 2, 'stok_jumlah' => 30, 'user_id' => 1, 'supplier_id' => 2, 'stok_tanggal' => $tanggalSekarang],
            ['barang_id' => 3, 'stok_jumlah' => 25, 'user_id' => 1, 'supplier_id' => 3, 'stok_tanggal' => $tanggalSekarang],
            ['barang_id' => 4, 'stok_jumlah' => 40, 'user_id' => 1, 'supplier_id' => 4, 'stok_tanggal' => $tanggalSekarang],
            ['barang_id' => 5, 'stok_jumlah' => 10, 'user_id' => 1, 'supplier_id' => 5, 'stok_tanggal' => $tanggalSekarang],
            ['barang_id' => 6, 'stok_jumlah' => 60, 'user_id' => 1, 'supplier_id' => 1, 'stok_tanggal' => $tanggalSekarang],
            ['barang_id' => 7, 'stok_jumlah' => 20, 'user_id' => 1, 'supplier_id' => 2, 'stok_tanggal' => $tanggalSekarang],
            ['barang_id' => 8, 'stok_jumlah' => 15, 'user_id' => 1, 'supplier_id' => 3, 'stok_tanggal' => $tanggalSekarang],
            ['barang_id' => 9, 'stok_jumlah' => 70, 'user_id' => 1, 'supplier_id' => 4, 'stok_tanggal' => $tanggalSekarang],
            ['barang_id' => 10, 'stok_jumlah' => 90, 'user_id' => 1, 'supplier_id' => 5, 'stok_tanggal' => $tanggalSekarang],
        ];

        DB::table('t_stok')->insert($data);
    }
}
