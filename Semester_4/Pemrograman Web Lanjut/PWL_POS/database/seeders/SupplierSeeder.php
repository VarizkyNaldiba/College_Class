<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'supplier_id' => 1,
                'supplier_kode' => 'SUP001',
                'supplier_nama' => 'PT Indofood Sukses Makmur',
                'supplier_alamat' => 'Jl. Sudirman Kav. 76-78, Jakarta Selatan',
                'supplier_telepon' => '021-5795-8822',
                'supplier_email' => 'contact@indofood.co.id'
            ],
            [
                'supplier_id' => 2,
                'supplier_kode' => 'SUP002',
                'supplier_nama' => 'PT Unilever Indonesia',
                'supplier_alamat' => 'Jl. BSD Boulevard Barat, Tangerang Selatan',
                'supplier_telepon' => '021-5890-8000',
                'supplier_email' => 'info@unilever.co.id'
            ],
            [
                'supplier_id' => 3,
                'supplier_kode' => 'SUP003',
                'supplier_nama' => 'PT Wings Surya',
                'supplier_alamat' => 'Jl. Rungkut Industri III No. 12-18, Surabaya',
                'supplier_telepon' => '031-843-2323',
                'supplier_email' => 'cs@wings.co.id'
            ],
            [
                'supplier_id' => 4,
                'supplier_kode' => 'SUP004',
                'supplier_nama' => 'PT Nestle Indonesia',
                'supplier_alamat' => 'Jl. TB Simatupang Kav. 88, Jakarta Selatan',
                'supplier_telepon' => '021-2992-8000',
                'supplier_email' => 'consumer.services@id.nestle.com'
            ],
            [
                'supplier_id' => 5,
                'supplier_kode' => 'SUP005',
                'supplier_nama' => 'PT Mayora Indah',
                'supplier_alamat' => 'Gedung Mayora, Jl. Tomang Raya No. 21-23, Jakarta Barat',
                'supplier_telepon' => '021-566-8822',
                'supplier_email' => 'info@mayora.co.id'
            ]
        ];

        DB::table('m_supplier')->insert($data);
    }
}
