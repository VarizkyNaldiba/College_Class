<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['penjualan_id' => 101, 'barang_id' => 1, 'jumlah' => 1, 'harga' => 2500000],
            ['penjualan_id' => 101, 'barang_id' => 3, 'jumlah' => 2, 'harga' => 75000],
            ['penjualan_id' => 102, 'barang_id' => 2, 'jumlah' => 1, 'harga' => 1800000],
            ['penjualan_id' => 102, 'barang_id' => 5, 'jumlah' => 3, 'harga' => 12000],
            ['penjualan_id' => 103, 'barang_id' => 4, 'jumlah' => 2, 'harga' => 150000],
            ['penjualan_id' => 103, 'barang_id' => 6, 'jumlah' => 1, 'harga' => 20000],
            ['penjualan_id' => 104, 'barang_id' => 7, 'jumlah' => 4, 'harga' => 8000],
            ['penjualan_id' => 104, 'barang_id' => 8, 'jumlah' => 2, 'harga' => 10000],
            ['penjualan_id' => 105, 'barang_id' => 9, 'jumlah' => 5, 'harga' => 5000],
            ['penjualan_id' => 105, 'barang_id' => 10, 'jumlah' => 3, 'harga' => 9000],
        ];

        DB::table('t_penjualan_detail')->insert($data);
    }
}
