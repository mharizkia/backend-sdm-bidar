<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prodis')->insert([
            [
                'id' => 1,
                'nama_prodi' => 'Manajemen Informatika',
                'kode_prodi' => '121',
                'fakultas_id' => 1,
                'jenjang_id' => 1,
                'is_active' => true,
            ],
            [
                'id' => 2,
                'nama_prodi' => 'Teknik Komputer',
                'kode_prodi' => '122',
                'fakultas_id' => 1,
                'jenjang_id' => 1,
                'is_active' => true,
            ],
            [
                'id' => 3,
                'nama_prodi' => 'Administrasi Bisnis',
                'kode_prodi' => '125',
                'fakultas_id' => 1,
                'jenjang_id' => 1,
                'is_active' => true,
            ],
            [
                'id' => 4,
                'nama_prodi' => 'Pengelolaan Perhotelan',
                'kode_prodi' => '126',
                'fakultas_id' => 1,
                'jenjang_id' => 2,
                'is_active' => true,
            ],
            [
                'id' => 5,
                'nama_prodi' => 'Teknik Informatika',
                'kode_prodi' => '142',
                'fakultas_id' => 2,
                'jenjang_id' => 3,
                'is_active' => true,
            ],
            [
                'id' => 6,
                'nama_prodi' => 'Sistem Informasi',
                'kode_prodi' => '141',
                'fakultas_id' => 2,
                'jenjang_id' => 3,
                'is_active' => true,
            ],
            [
                'id' => 7,
                'nama_prodi' => 'Teknik Sipil',
                'kode_prodi' => '171',
                'fakultas_id' => 2,
                'jenjang_id' => 3,
                'is_active' => true,
            ],
            [
                'id' => 8,
                'nama_prodi' => 'Teknik Elektro',
                'kode_prodi' => '172',
                'fakultas_id' => 2,
                'jenjang_id' => 3,
                'is_active' => true,
            ],
            [
                'id' => 9,
                'nama_prodi' => 'Teknik Industri',
                'kode_prodi' => '173',
                'fakultas_id' => 2,
                'jenjang_id' => 3,
                'is_active' => true,
            ],
            [
                'id' => 10,
                'nama_prodi' => 'Pendidikan Olahraga',
                'kode_prodi' => '133',
                'fakultas_id' => 3,
                'jenjang_id' => 3,
                'is_active' => true,
            ],
            [
                'id' => 11,
                'nama_prodi' => 'Pendidikan Bahasa Indonesia',
                'kode_prodi' => '132',
                'fakultas_id' => 3,
                'jenjang_id' => 3,
                'is_active' => true,
            ],
            [
                'id' => 12,
                'nama_prodi' => 'Akuntansi',
                'kode_prodi' => '152',
                'fakultas_id' => 3,
                'jenjang_id' => 3,
                'is_active' => true,
            ],
            [
                'id' => 13,
                'nama_prodi' => 'Manajemen',
                'kode_prodi' => '151',
                'fakultas_id' => 3,
                'jenjang_id' => 3,
                'is_active' => true,
            ],
            [
                'id' => 14,
                'nama_prodi' => 'Psikologi',
                'kode_prodi' => '140',
                'fakultas_id' => 3,
                'jenjang_id' => 3,
                'is_active' => true,
            ],
            [
                'id' => 15,
                'nama_prodi' => 'Ilmu Komunikasi',
                'kode_prodi' => '191',
                'fakultas_id' => 3,
                'jenjang_id' => 3,
                'is_active' => true,
            ],
            [
                'id' => 16,
                'nama_prodi' => 'Sastra Inggris',
                'kode_prodi' => '161',
                'fakultas_id' => 3,
                'jenjang_id' => 3,
                'is_active' => true,
            ],
            [
                'id' => 17,
                'nama_prodi' => 'Magister Manajemen',
                'kode_prodi' => '251',
                'fakultas_id' => 4,
                'jenjang_id' => 4,
                'is_active' => true,
            ],
            [
                'id' => 18,
                'nama_prodi' => 'Magister Teknik Informatika',
                'kode_prodi' => '242',
                'fakultas_id' => 4,
                'jenjang_id' => 4,
                'is_active' => true,
            ],
            [
                'id' => 19,
                'nama_prodi' => 'Magister Ilmu Komunikasi',
                'kode_prodi' => '291',
                'fakultas_id' => 4,
                'jenjang_id' => 4,
                'is_active' => true,
            ],
            [
                'id' => 20,
                'nama_prodi' => 'Magister Teknik Sipil',
                'kode_prodi' => '271',
                'fakultas_id' => 4,
                'jenjang_id' => 4,
                'is_active' => true,
            ],
            [
                'id' => 21,
                'nama_prodi' => 'Magister Pendidikan Jasmani',
                'kode_prodi' => '233',
                'fakultas_id' => 4,
                'jenjang_id' => 4,
                'is_active' => true,
            ]
        ]);
    }
}
