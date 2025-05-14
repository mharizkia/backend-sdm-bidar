<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_prodi',
        'kode_prodi',
        'fakultas_id',
        'jenjang_id',
        'is_active',
    ];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
}
