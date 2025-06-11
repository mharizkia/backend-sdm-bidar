<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Dosen extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'pelamar_id',
        'user_id',
        'kode_dosen',
        'password',
        'nik_ktp',
        'nip',
        'nidn',
        'nuptk',
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
        'akhir_ikatan_kerja',
        'tanggal_mulai_kerja',
        'pendidikan_tertinggi',
        'jabatan_akademik_id',
        'golongan_id',
        'status_aktivasi',
        'foto_dosen',
        'dokumen_dosen',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function jabatanAkademik()
    {
        return $this->belongsTo(JabatanAkademik::class);
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }
    
}
