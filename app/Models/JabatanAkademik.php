<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanAkademik extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jabatan_akademik',
    ];

    public function golongan()
    {
        return $this->hasMany(Golongan::class);
    }
    public function dosen()
    {
        return $this->hasMany(Dosen::class);
    }
}
