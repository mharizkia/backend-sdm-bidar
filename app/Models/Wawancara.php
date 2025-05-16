<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wawancara extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelamar_id',
        'nama_pewawancara',
        'tanggal_wawancara',
        'poin_poin_wawancara',
        'kesimpulan',
        'pewawancara_id',
        'status',
    ];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class, 'pelamar_id');
    }
    public function pewawancara()
    {
        return $this->belongsTo(Pewawancara::class, 'pewawancara_id');
    }
}
