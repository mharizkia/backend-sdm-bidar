<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $dosens = [
            [
                'kode_dosen' => 'DSN0001',
                'password' => Hash::make('password123'),
                'nik_ktp' => '3204011111110001',
                'nip' => '198011110001',
                'nidn' => '0010111001',
                'nama_dosen' => 'Dr. Andi Saputra',
                'umur' => 45,
                'gelar_depan' => 'Dr.',
                'gelar_belakang' => 'M.Kom',
                'email' => 'andi@example.com',
                'no_hp' => '081234567890',
                'no_npwp' => 'NPWP123456',
                'tempat_lahir' => 'Palembang',
                'tanggal_lahir' => '1980-01-15',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Merdeka No.1',
                'agama' => 'Islam',
                'golongan_darah' => 'A',
                'fakultas_id' => 1,
                'prodi_id' => 1,
                'bidang_ilmu_kompetensi' => 'Sistem Informasi',
                'ikatan_kerja' => 'Tetap',
                'akhir_ikatan_kerja' => '2030-12-31',
                'tanggal_mulai_kerja' => '2015-08-01',
                'pendidikan_tertinggi' => 'S3',
                'jabatan_akademik_id' => 1,
                'golongan_id' => 1,
<<<<<<< HEAD
                'status_aktivasi' => 'aktif',
=======
                'status_aktivasi' => true,
>>>>>>> refs/remotes/origin/main
                'foto_dosen' => '',
                'dokumen_dosen' => '',
            ],
            [
                'kode_dosen' => 'DSN0002',
                'password' => Hash::make('password123'),
                'nik_ktp' => '3204012222220002',
                'nip' => '198512120002',
                'nidn' => '0020222002',
                'nama_dosen' => 'Dr. Budi Santoso',
                'umur' => 40,
                'gelar_depan' => 'Dr.',
                'gelar_belakang' => 'M.TI',
                'email' => 'laladl@gmail.com',
                'no_hp' => '082345678901',
                'no_npwp' => 'NPWP654321',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1985-02-20',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Kebangsaan No.2',
                'agama' => 'Islam',
                'golongan_darah' => 'B',
                'fakultas_id' => 1,
                'prodi_id' => 1,
                'bidang_ilmu_kompetensi' => 'Teknik Informatika',
                'ikatan_kerja' => 'Kontrak',
                'akhir_ikatan_kerja' => '2025-12-31',
                'tanggal_mulai_kerja' => '2018-09-01',
                'pendidikan_tertinggi' => 'S3',
                'jabatan_akademik_id' => 2,
                'golongan_id' => 2,
<<<<<<< HEAD
                'status_aktivasi' => 'aktif',
=======
                'status_aktivasi' => true,
>>>>>>> refs/remotes/origin/main
                'foto_dosen' => '',
                'dokumen_dosen' => '',
            ],
            [
                'kode_dosen' => 'DSN0003',
                'password' => Hash::make('password123'),
                'nik_ktp' => '3204013333330003',
                'nip' => '197702030003',
                'nidn' => '0030333003',
                'nama_dosen' => 'Prof. Citra Wahyuni',
                'umur' => 48,
                'gelar_depan' => 'Prof.',
                'gelar_belakang' => 'Ph.D',
                'email' => 'citra@example.com',
                'no_hp' => '083456789012',
                'no_npwp' => 'NPWP111333',
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => '1977-03-05',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Veteran No.3',
                'agama' => 'Islam',
                'golongan_darah' => 'AB',
                'fakultas_id' => 1,
                'prodi_id' => 1,
                'bidang_ilmu_kompetensi' => 'Ilmu Komputer',
                'ikatan_kerja' => 'Tetap',
                'akhir_ikatan_kerja' => '2032-12-31',
                'tanggal_mulai_kerja' => '2010-06-15',
                'pendidikan_tertinggi' => 'S3',
                'jabatan_akademik_id' => 3,
                'golongan_id' => 3,
<<<<<<< HEAD
                'status_aktivasi' => 'tidak_aktif',
=======
                'status_aktivasi' => true,
>>>>>>> refs/remotes/origin/main
                'foto_dosen' => '',
                'dokumen_dosen' => '',
            ],
            [
                'kode_dosen' => 'DSN0004',
                'password' => Hash::make('password123'),
                'nik_ktp' => '3204014444440004',
                'nip' => '199001010004',
                'nidn' => '0040444004',
                'nama_dosen' => 'Dian Prasetya',
                'umur' => 34,
                'gelar_depan' => '',
                'gelar_belakang' => 'M.Kom',
                'email' => 'dian@example.com',
                'no_hp' => '084567890123',
                'no_npwp' => 'NPWP444555',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1990-01-01',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Mawar No.4',
                'agama' => 'Islam',
                'golongan_darah' => 'O',
                'fakultas_id' => 1,
                'prodi_id' => 1,
                'bidang_ilmu_kompetensi' => 'Jaringan Komputer',
                'ikatan_kerja' => 'Kontrak',
                'akhir_ikatan_kerja' => '2026-12-31',
                'tanggal_mulai_kerja' => '2020-02-01',
                'pendidikan_tertinggi' => 'S2',
                'jabatan_akademik_id' => 2,
                'golongan_id' => 2,
<<<<<<< HEAD
                'status_aktivasi' => 'aktif',
=======
                'status_aktivasi' => true,
>>>>>>> refs/remotes/origin/main
                'foto_dosen' => '',
                'dokumen_dosen' => '',
            ],
            [
                'kode_dosen' => 'DSN0005',
                'password' => Hash::make('password123'),
                'nik_ktp' => '3204015555550005',
                'nip' => '198303150005',
                'nidn' => '0050555005',
                'nama_dosen' => 'Rina Lestari',
                'umur' => 42,
                'gelar_depan' => '',
                'gelar_belakang' => 'M.T',
                'email' => 'rina@example.com',
                'no_hp' => '085678901234',
                'no_npwp' => 'NPWP666777',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '1983-03-15',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Melati No.5',
                'agama' => 'Islam',
                'golongan_darah' => 'A',
                'fakultas_id' => 1,
                'prodi_id' => 1,
                'bidang_ilmu_kompetensi' => 'Pemrograman Web',
                'ikatan_kerja' => 'Tetap',
                'akhir_ikatan_kerja' => '2030-07-31',
                'tanggal_mulai_kerja' => '2012-03-01',
                'pendidikan_tertinggi' => 'S2',
                'jabatan_akademik_id' => 2,
                'golongan_id' => 2,
<<<<<<< HEAD
                'status_aktivasi' => 'aktif',
=======
                'status_aktivasi' => true,
>>>>>>> refs/remotes/origin/main
                'foto_dosen' => '',
                'dokumen_dosen' => '',
            ],
            [
                'kode_dosen' => 'DSN0006',
                'password' => Hash::make('password123'),
                'nik_ktp' => '3204016666660006',
                'nip' => '199509100006',
                'nidn' => '0060666006',
                'nama_dosen' => 'Fajar Nugroho',
                'umur' => 30,
                'gelar_depan' => '',
                'gelar_belakang' => 'M.Kom',
                'email' => 'fajar@example.com',
                'no_hp' => '086789012345',
                'no_npwp' => 'NPWP888999',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '1995-09-10',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Sakura No.6',
                'agama' => 'Kristen',
                'golongan_darah' => 'B',
                'fakultas_id' => 1,
                'prodi_id' => 1,
                'bidang_ilmu_kompetensi' => 'AI & Machine Learning',
                'ikatan_kerja' => 'Kontrak',
                'akhir_ikatan_kerja' => '2026-06-30',
                'tanggal_mulai_kerja' => '2021-01-01',
                'pendidikan_tertinggi' => 'S2',
                'jabatan_akademik_id' => 1,
                'golongan_id' => 1,
<<<<<<< HEAD
                'status_aktivasi' => 'aktif',
=======
                'status_aktivasi' => true,
>>>>>>> refs/remotes/origin/main
                'foto_dosen' => '',
                'dokumen_dosen' => '',
            ],
            [
                'kode_dosen' => 'DSN0007',
                'password' => Hash::make('password123'),
                'nik_ktp' => '3204017777770007',
                'nip' => '197812250007',
                'nidn' => '0070777007',
                'nama_dosen' => 'Sri Handayani',
                'umur' => 47,
                'gelar_depan' => 'Dr.',
                'gelar_belakang' => 'M.Si',
                'email' => 'sri@example.com',
                'no_hp' => '087890123456',
                'no_npwp' => 'NPWP000111',
                'tempat_lahir' => 'Padang',
                'tanggal_lahir' => '1978-12-25',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Anggrek No.7',
                'agama' => 'Islam',
                'golongan_darah' => 'AB',
                'fakultas_id' => 1,
                'prodi_id' => 1,
                'bidang_ilmu_kompetensi' => 'Statistika Komputasi',
                'ikatan_kerja' => 'Tetap',
                'akhir_ikatan_kerja' => '2031-11-30',
                'tanggal_mulai_kerja' => '2009-07-01',
                'pendidikan_tertinggi' => 'S3',
                'jabatan_akademik_id' => 4,
                'golongan_id' => 3,
<<<<<<< HEAD
                'status_aktivasi' => 'aktif',
=======
                'status_aktivasi' => true,
>>>>>>> refs/remotes/origin/main
                'foto_dosen' => '',
                'dokumen_dosen' => '',
            ],
            [
                'kode_dosen' => 'DSN0008',
                'password' => Hash::make('password123'),
                'nik_ktp' => '3204018888880008',
                'nip' => '198906060008',
                'nidn' => '0080888008',
                'nama_dosen' => 'Indra Prabowo',
                'umur' => 35,
                'gelar_depan' => '',
                'gelar_belakang' => 'M.Kom',
                'email' => 'indra@example.com',
                'no_hp' => '088901234567',
                'no_npwp' => 'NPWP222333',
                'tempat_lahir' => 'Palembang',
                'tanggal_lahir' => '1989-06-06',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Kenanga No.8',
                'agama' => 'Islam',
                'golongan_darah' => 'O',
                'fakultas_id' => 1,
                'prodi_id' => 1,
                'bidang_ilmu_kompetensi' => 'Basis Data',
                'ikatan_kerja' => 'Kontrak',
                'akhir_ikatan_kerja' => '2025-12-31',
                'tanggal_mulai_kerja' => '2019-08-01',
                'pendidikan_tertinggi' => 'S2',
                'jabatan_akademik_id' => 1,
                'golongan_id' => 1,
<<<<<<< HEAD
                'status_aktivasi' => 'aktif',
=======
                'status_aktivasi' => true,
>>>>>>> refs/remotes/origin/main
                'foto_dosen' => '',
                'dokumen_dosen' => '',
            ],
        ];

        foreach ($dosens as $dosenData) {

            $user = User::create([
                'name' => $dosenData['nama_dosen'],
                'kode' => $dosenData['kode_dosen'], 
                'email' => $dosenData['email'],
                'password' => $dosenData['password'], 
            ]);
            $user->assignRole('dosen');

            $dosenData['user_id'] = $user->id;

            Dosen::create($dosenData);
        }
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> refs/remotes/origin/main
