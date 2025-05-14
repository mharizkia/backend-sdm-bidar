<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fakultas')->insert([
            [
                'id' => 1,
                'nama_fakultas' => 'Fakultas Vokasi',
                'urutan' => 'A',
                'is_active' => true,
            ],
            [
                'id' => 2,
                'nama_fakultas' => 'Fakultas Sains Teknologi',
                'urutan' => 'B',
                'is_active' => true,
            ],
            [
                'id' => 3,
                'nama_fakultas' => 'Fakultas Sosial Humaniora',
                'urutan' => 'C',
                'is_active' => true,
            ],
            [
                'id' => 4,
                'nama_fakultas' => 'Pascasarjana',
                'urutan' => 'D',
                'is_active' => true,
            ],
        ]);
    }
}
