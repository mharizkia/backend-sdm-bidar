<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_fakultas',
        'urutan',
        'is_active',
    ];

    public function prodis()
    {
        return $this->hasMany(Prodi::class);
    }

    public function dosens()
    {
        return $this->hasMany(Dosen::class);
    }
}
