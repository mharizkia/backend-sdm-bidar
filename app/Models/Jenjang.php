<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jenjang',
        'kode_jenjang',
    ];

    public function prodis()
    {
        return $this->hasMany(Prodi::class);
    }
}
