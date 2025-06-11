<?php

namespace App\Exports;

use App\Models\Pelamar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PelamarExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{

    public function collection()
    {
        return Pelamar::all();
    }

 
    public function headings(): array
    {
        return [
            'ID',
            'Kode',
            'Nama Pelamar',
            'NIDN',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Email',
            'Alamat',
            'Pendidikan Terakhir',
            'Usia',
            'Nomor HP',
            'IPK',
            'Bidang Ilmu',
            'Pilihan Lamaran',
            'Tanggal Lamaran',
            'Tanggal Dibuat',
        ];
    }

    public function map($pelamar): array
    {
        return [
            $pelamar->id,
            $pelamar->kode,
            $pelamar->nama_pelamar,
            $pelamar->nidn,
            $pelamar->tempat_lahir,
            $pelamar->tanggal_lahir,
            $pelamar->jenis_kelamin,
            $pelamar->email,
            $pelamar->alamat,
            $pelamar->pendidikan_tertinggi,
            $pelamar->umur,
            $pelamar->no_hp,
            $pelamar->ipk,
            $pelamar->bidang_ilmu_kompetensi,
            $pelamar->pilihan_lamaran,
            $pelamar->tanggal_lamaran,
            $pelamar->created_at->format('d-m-Y'),
        ];
    }
}