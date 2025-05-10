<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelamar_id',
        'kode_karyawan',
        'password',
        'nik_ktp',
        'nama_karyawan',
        'email',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'agama',
        'jenis_kelamin',
        'no_hp',
        'no_npwp',
        'golongan_darah',
        'pendidikan_tertinggi',
        'ikatan_kerja',
        'jabatan',
        'tanggal_mulai_kerja',
        'unit_kerja_id',
        'status_aktivasi',
        'foto_karyawan',
        'dokumen_karyawan',
    ];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }
}
