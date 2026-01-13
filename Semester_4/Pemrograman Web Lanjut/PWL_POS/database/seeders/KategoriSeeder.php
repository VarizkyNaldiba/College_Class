<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'kategori_kode' => 'SMN',
                'kategori_nama' => 'Semen & Bahan Baku',
            ],
            [
                'kategori_id' => 2,
                'kategori_kode' => 'BSI',
                'kategori_nama' => 'Besi & Baja',
            ],
            [
                'kategori_id' => 3,
                'kategori_kode' => 'PLN',
                'kategori_nama' => 'Pipa & Plumbing',
            ],
            [
                'kategori_id' => 4,
                'kategori_kode' => 'CAT',
                'kategori_nama' => 'Cat & Finishing',
            ],
            [
                'kategori_id' => 5,
                'kategori_kode' => 'LST',
                'kategori_nama' => 'Listrik & Instalasi',
            ],
            [
                'kategori_id' => 6,
                'kategori_kode' => 'KRM',
                'kategori_nama' => 'Keramik & Granit',
            ],
            [
                'kategori_id' => 7,
                'kategori_kode' => 'KYU',
                'kategori_nama' => 'Kayu & Triplek',
            ],
        ];
        DB::table('m_kategori')->insert($data);
    }
}