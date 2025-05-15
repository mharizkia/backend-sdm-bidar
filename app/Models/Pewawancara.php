<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pewawancara extends Model
{
    use HasFactory;

    protected $fillable = [
        'jabatan_pewawancara',
        'dokumen_pewawancara',
    ];

    public function pelamar()
    {
        return $this->hasMany(Pelamar::class);
    }
    public function wawancara()
    {
        return $this->hasMany(Wawancara::class);
    }
}
