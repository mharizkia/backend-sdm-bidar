<?php

namespace App\Imports;

use App\Models\Pelamar;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PelamarImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Pelamar([
            'nama_pelamar' => $row['nama_pelamar'],
            'nidn' => $row['nidn'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'email' => $row['email'],
            'no_hp' => $row['no_hp'],
            'alamat' => $row['alamat'],
            'pendidikan_tertinggi' => $row['pendidikan_tertinggi'],
            'umur' => $row['umur'],
            'ipk' => $row['ipk'],
            'bidang_ilmu_kompetensi' => $row['bidang_ilmu_kompetensi'],
            'pilihan_lamaran' => $row['pilihan_lamaran'],
            'tanggal_lamaran' => $row['tanggal_lamaran'],
            'dokumen_lamaran' => $row['dokumen_lamaran'],
        ]);
    }
}