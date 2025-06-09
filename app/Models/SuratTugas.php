<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratTugas extends Model
{
    use HasFactory;

    protected $table = 'surat_tugas';

    protected $fillable = [
        'user_id',
        'no_sk',
        'tanggal_sk',
        'keterangan',
        'tenggat_waktu',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}