<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wawancara extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelamar_id',
        'tanggal_wawancara',
        'poin_poin_wawancara',
        'kesimpulan',
        'pewawancara_id',
    ];
}
