<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['penjualan_id' => 101, 'penjualan_kode' => '01', 'penjualan_tanggal' => '2025-02-25', 'pembeli' => 'Budianto', 'user_id' => 2],
            ['penjualan_id' => 102, 'penjualan_kode' => '02', 'penjualan_tanggal' => '2025-02-26', 'pembeli' => 'Daniel', 'user_id' => 3],
            ['penjualan_id' => 103, 'penjualan_kode' => '03', 'penjualan_tanggal' => '2025-02-27', 'pembeli' => 'Azriel', 'user_id' => 1],
            ['penjualan_id' => 104, 'penjualan_kode' => '04', 'penjualan_tanggal' => '2025-02-28', 'pembeli' => 'Amba', 'user_id' => 1],
            ['penjualan_id' => 105, 'penjualan_kode' => '05', 'penjualan_tanggal' => '2025-03-01', 'pembeli' => 'Tepe', 'user_id' => 2],
            ['penjualan_id' => 106, 'penjualan_kode' => '06', 'penjualan_tanggal' => '2025-03-02', 'pembeli' => 'Jot', 'user_id' => 3],
            ['penjualan_id' => 107, 'penjualan_kode' => '07', 'penjualan_tanggal' => '2025-03-03', 'pembeli' => 'Arap', 'user_id' => 1],
            ['penjualan_id' => 108, 'penjualan_kode' => '08', 'penjualan_tanggal' => '2025-03-04', 'pembeli' => 'Speed', 'user_id' => 2],
            ['penjualan_id' => 109, 'penjualan_kode' => '09', 'penjualan_tanggal' => '2025-03-05', 'pembeli' => 'Garry', 'user_id' => 3],
            ['penjualan_id' => 110, 'penjualan_kode' => '10', 'penjualan_tanggal' => '2025-03-06', 'pembeli' => 'Niko', 'user_id' => 1],
        ];

        DB::table('t_penjualan')->insert($data);
    }
}
