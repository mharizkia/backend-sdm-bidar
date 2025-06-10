<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KatUnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kat_unit_kerjas')->insert([
            [
                'id' => 1,
                'nama_kat_unit_kerja' => 'Direktorat Kemahasiswaan',
            ],
            [
                'id' => 2,
                'nama_kat_unit_kerja' => 'Direktorat Akademik',
            ],
            [
                'id' => 3,
                'nama_kat_unit_kerja' => 'Direktorat Sumber Daya Manusia',
            ],
            [
                'id' => 4,
                'nama_kat_unit_kerja' => 'Direktorat Sistem dan Teknologi Informasi',
            ],
            [
                'id' => 5,
                'nama_kat_unit_kerja' => 'Direktorat Pengadaan dan Pengelolaan Aset',
            ],
            [
                'id' => 6,
                'nama_kat_unit_kerja' => 'Direktorat Language Center',
            ],
            [
                'id' => 7,
                'nama_kat_unit_kerja' => 'Direktorat Pengembangan Akademik',
            ],
            [
                'id' => 8,
                'nama_kat_unit_kerja' => 'Direktorat Inovasi dan Inkubator Bisnis',
            ],
            [
                'id' => 9,
                'nama_kat_unit_kerja' => 'Direktorat Keuangan',
            ],
            [
                'id' => 10,
                'nama_kat_unit_kerja' => 'Badan Penjamin Mutu dan Akreditasi',
            ],
            [
                'id' => 11,
                'nama_kat_unit_kerja' => 'Direktorat Riset dan Pengabdian kepada Masyarakat',
            ],
            [
                'id' => 12,
                'nama_kat_unit_kerja' => 'Direktorat Urusan Internasional, Karir, Alumni dan Kerjasama',
            ],
            [
                'id' => 13,
                'nama_kat_unit_kerja' => 'Unit Humas dan KIP',
            ],
            [
                'id' => 14,
                'nama_kat_unit_kerja' => 'Unit Marketing',
            ],
            [
                'id' => 15,
                'nama_kat_unit_kerja' => 'Unit MBKM',
            ],
            [
                'id' => 16,
                'nama_kat_unit_kerja' => 'Unit Perpustakaan',
            ],
            [
                'id' => 17,
                'nama_kat_unit_kerja' => 'Unit Laboratorium',
            ],
            [
                'id' => 18,
                'nama_kat_unit_kerja' => 'Unit Pusat Pelayanan Psikologi',
            ],
            [
                'id' => 19,
                'nama_kat_unit_kerja' => 'Sekretariat Universitas',
            ],
            [
                'id' => 20,
                'nama_kat_unit_kerja' => 'Sekretariat Pascasarjana',
            ],
        ]);
    }
}
