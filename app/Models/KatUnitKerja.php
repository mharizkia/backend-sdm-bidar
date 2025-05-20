<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatUnitKerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kat_unit_kerja',
        'kode_kat_unit_kerja',
        'is_active',
    ];

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}
