<?php

namespace App\Exports;

use App\Models\Pelamar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class ValidasiExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
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
            'IPK',
            'Bidang Ilmu',
            'Nomor HP',
            'Pilihan Lamaran',
            'Tanggal Lamaran',
            'Status',
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
            $pelamar->ipk,
            $pelamar->bidang_ilmu_kompetensi,
            $pelamar->nomor_hp,
            $pelamar->pilihan_lamaran,
            $pelamar->tanggal_lamaran,
            $pelamar->status,
            $pelamar->created_at->format('d-m-Y'),
        ];
    }
}