<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_golongan',
        'jabatan_akademik_id',
    ];

    public function jabatanAkademik()
    {
        return $this->belongsTo(JabatanAkademik::class);
    }
    public function dosen()
    {
        return $this->hasMany(Dosen::class);
    }
}
