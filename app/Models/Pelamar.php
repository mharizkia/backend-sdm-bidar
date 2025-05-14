<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pelamar) {
            $prefix = strtoupper(substr($pelamar->pilihan_lamaran, 0, 1)); // 'dosen' -> 'D', 'karyawan' -> 'K'

            $lastKode = self::where('pilihan_lamaran', $pelamar->pilihan_lamaran)
                ->where('kode', 'like', $prefix . '-%')
                ->orderByDesc('id')
                ->value('kode');

            $lastNumber = $lastKode ? (int) str_replace($prefix . '-', '', $lastKode) : 0;
            $newKode = $prefix . '-' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

            $pelamar->kode = $newKode;
        });
    }

    public function karyawan()
    {
        return $this->hasOne(Karyawan::class);
    }

    public function dosen()
    {
        return $this->hasOne(Dosen::class);
    }
}
