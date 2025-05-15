<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('golongans')->insert([
            [
                'id' => 1,
                'nama_golongan' => '',
                'kode_golongan' => '10',
                'pangkat' => '',
                'kumulatif' => 0,
                'jabatan_akademik_id' => 1,
            ],
            [
                'id' => 2,
                'nama_golongan' => 'IIIa',
                'kode_golongan' => '9',
                'pangkat' => 'Penata Muda',
                'kumulatif' => 100,
                'jabatan_akademik_id' => 2,
            ],
            [
                'id' => 3,
                'nama_golongan' => 'IIIb',
                'kode_golongan' => '8',
                'pangkat' => 'Penata Muda Tk. I',
                'kumulatif' => 150,
                'jabatan_akademik_id' => 2,
            ],
            [
                'id' => 4,
                'nama_golongan' => 'IIIc',
                'kode_golongan' => '7',
                'pangkat' => 'Penata',
                'kumulatif' => 200,
                'jabatan_akademik_id' => 3,
            ],
            [
                'id' => 5,
                'nama_golongan' => 'IIId',
                'kode_golongan' => '6',
                'pangkat' => 'Penata Tk. I',
                'kumulatif' => 300,
                'jabatan_akademik_id' => 3,
            ],
            [
                'id' => 6,
                'nama_golongan' => 'IVa',
                'kode_golongan' => '5',
                'pangkat' => 'Pembina',
                'kumulatif' => 400,
                'jabatan_akademik_id' => 4,
            ],
            [
                'id' => 7,
                'nama_golongan' => 'IVb',
                'kode_golongan' => '4',
                'pangkat' => 'Pembina Tk. I',
                'kumulatif' => 550,
                'jabatan_akademik_id' => 4,
            ],
            [
                'id' => 8,
                'nama_golongan' => 'IVc',
                'kode_golongan' => '3',
                'pangkat' => 'Pembina Utama Muda',
                'kumulatif' => 700,
                'jabatan_akademik_id' => 4,
            ],
            [
                'id' => 9,
                'nama_golongan' => 'IVd',
                'kode_golongan' => '2',
                'pangkat' => 'Pembina Utama Madya',
                'kumulatif' => 850,
                'jabatan_akademik_id' => 5,
            ],
            [
                'id' => 10,
                'nama_golongan' => 'IVe',
                'kode_golongan' => '1',
                'pangkat' => 'Pembina Utama',
                'kumulatif' => 1050,
                'jabatan_akademik_id' => 5,
            ],
        ]);
    }
}
