<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jabatan_akademiks')->insert([
            [
                'id' => 1,
                'nama_jabatan_akademik' => 'Tenaga Pengajar',
            ],
            [
                'id' => 2,
                'nama_jabatan_akademik' => 'Assisten Ahli',
            ],
            [
                'id' => 3,
                'nama_jabatan_akademik' => 'Lektor',
            ],
            [
                'id' => 4,
                'nama_jabatan_akademik' => 'Lektor Kepala',
            ],
            [
                'id' => 5,
                'nama_jabatan_akademik' => 'Guru Besar',
            ],
        ]);
    }
}
