<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lembaga',
        'nomor_registrasi',
        'no_sertifikat',
        'tanggal_sertifikat',
        'tmt_sertifikat',
        'file_sertifikat',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}