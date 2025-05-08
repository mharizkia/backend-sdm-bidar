<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psikologi extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelamar_id',
        'tanggal_psikologis',
        'poin_poin_psikologis',
        'kesimpulan',    
    ];
}
