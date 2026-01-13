<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1,
                'level_id' => 1,
                'username' => 'admin',
                'nama' => 'Administrator Toko',
                'password' => Hash::make('admin123'), 
            ],
            [
                'user_id' => 2,
                'level_id' => 2,
                'username' => 'pegawai1',
                'nama' => 'Budi Santoso',
                'password' => Hash::make('pegawai123'), 
            ],
            [
                'user_id' => 3,
                'level_id' => 2,
                'username' => 'pegawai2',
                'nama' => 'Siti Rahma',
                'password' => Hash::make('pegawai123'),
            ],
        ];

        DB::table('m_user')->insert($data);
    }
}
