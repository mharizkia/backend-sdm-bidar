<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelamar_id',
        'kode_dosen',
        'password',
        'nik_ktp',
        'nip',
        'nidn',
        'nama_dosen',
        'umur',
        'gelar_depan',
        'gelar_belakang',
        'email',
        'no_hp',
        'no_npwp',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'agama',
        'golongan_darah',
        'fakultas_id',
        'prodi_id',
        'bidang_ilmu_kompetensi',
        'ikatan_kerja',
        'tanggal_mulai_kerja',
        'pendidikan_tertinggi',
        'jabatan_akademik_id',
        'golongan_id',
        'status_aktivasi',
        'foto_dosen',
        'dokumen_dosen',
    ];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }
}
