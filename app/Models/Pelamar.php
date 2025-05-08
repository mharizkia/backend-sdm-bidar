<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelamar',
        'nidn',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'email',
        'no_hp',
        'alamat',
        'pendidikan_tertinggi',
        'usia',
        'ipk',
        'bidang_ilmu_kompetensi',
        'pilihan_lamaran',
        'tanggal_lamaran',
        'dokumen_lamaran',
        'status',   
    ];
}
