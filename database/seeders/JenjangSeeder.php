<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenjangs')->insert([
            [
                'id' => 1,
                'nama_jenjang' => 'DIPLOMA-3', 
                'kode_jenjang' => 'D3'
            ],
            [
                'id' => 2,
                'nama_jenjang' => 'DIPLOMA-4', 
                'kode_jenjang' => 'D4'
            ],
            [
                'id' => 3,
                'nama_jenjang' => 'STRATA-1', 
                'kode_jenjang' => 'S1'
            ],
            [
                'id' => 4,
                'nama_jenjang' => 'STRATA-2', 
                'kode_jenjang' => 'S2'
            ],
            [
                'id' => 5,
                'nama_jenjang' => 'STRATA-3', 
                'kode_jenjang' => 'S3'
            ],
        ]);
    }
}
