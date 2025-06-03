<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Cuti extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'user_id',
        'nomor_surat',
        'tanggal_surat',
        'nama', 
        'tipe',
        'tanggal_surat_pemohon',
        'jenis_cuti', 
        'terhitung_mulai', 
        'terhitung_hingga', 
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}