<?php

namespace App\Exports;

use App\Models\Pelamar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PelamarIndividuExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $pelamar;

    public function __construct($pelamar)
    {
        $this->pelamar = $pelamar;
    }

    public function collection()
    {
        return collect([
            [
                'kode' => $this->pelamar->kode,
                'nama_pelamar' => $this->pelamar->nama_pelamar,
                'nidn' => $this->pelamar->nidn,
                'tempat_lahir' => $this->pelamar->tempat_lahir,
                'tanggal_lahir' => $this->pelamar->tanggal_lahir,
                'jenis_kelamin' => $this->pelamar->jenis_kelamin,
                'email' => $this->pelamar->email,
                'no_hp' => $this->pelamar->no_hp,
                'alamat' => $this->pelamar->alamat,
                'pendidikan_tertinggi' => $this->pelamar->pendidikan_tertinggi,
                'umur' => $this->pelamar->umur,
                'ipk' => $this->pelamar->ipk,
                'bidang_ilmu_kompetensi' => $this->pelamar->bidang_ilmu_kompetensi,
                'pilihan_lamaran' => $this->pelamar->pilihan_lamaran,
                'tanggal_lamaran' => $this->pelamar->tanggal_lamaran,
                'status' => $this->pelamar->status,
            ]
        ]);
    }

    public function headings(): array
    {
        return [
            'Kode',
            'Nama Pelamar',
            'NIDN',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Email',
            'No HP',
            'Alamat',
            'Pendidikan Tertinggi',
            'Umur',
            'IPK',
            'Bidang Ilmu Kompetensi',
            'Pilihan Lamaran',
            'Tanggal Lamaran',
            'Status',
        ];
    }
}