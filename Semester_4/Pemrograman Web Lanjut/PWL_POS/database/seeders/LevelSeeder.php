<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
            ['level_id' => 1, 'level_kode' => 'A', 'level_nama' => 'Administrator'],
            ['level_id' => 2, 'level_kode' => 'U', 'level_nama' => 'Manager'],
            ['level_id' => 3, 'level_kode' => 'M', 'level_nama' => 'Staff/Kasir'],
       ];

       DB::table('m_level')->insert($data);
    }
}
