<?php

namespace App\Exports;

use App\Models\Pelamar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;


class PelamarExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithColumnFormatting
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
            'Nomor HP',       
            'Alamat',
            'Pendidikan Terakhir',
            'Usia',
            'IPK',
            'Bidang Ilmu',
            'Pilihan Lamaran',
            'Tanggal Lamaran',
            'Tanggal Dibuat',
        ];
    }

    public function map($pelamar): array
    {
        $jenisKelamin = '-';
        if ($pelamar->jenis_kelamin == 'L') {
            $jenisKelamin = 'Laki-laki';
        } elseif ($pelamar->jenis_kelamin == 'P') {
            $jenisKelamin = 'Perempuan';
        }

        return [
            $pelamar->id ?? '-',
            $pelamar->kode ?? '-',
            $pelamar->nama_pelamar ?? '-',
            $pelamar->nidn ?? '-',
            $pelamar->tempat_lahir ?? '-',
            $pelamar->tanggal_lahir ? date('d-m-Y', strtotime($pelamar->tanggal_lahir)) : '-',
            $jenisKelamin,
            $pelamar->email ?? '-',
            $pelamar->nomor_hp ?? '-',
            $pelamar->alamat ?? '-',
            $pelamar->pendidikan_tertinggi ?? '-',
            $pelamar->umur ?? '-',
            $pelamar->ipk ?? '-',
            $pelamar->bidang_ilmu_kompetensi ?? '-',
            $pelamar->pilihan_lamaran ?? '-',
            $pelamar->tanggal_lamaran ? date('d-m-Y', strtotime($pelamar->tanggal_lamaran)) : '-',
            $pelamar->created_at ? $pelamar->created_at->format('d-m-Y') : '-',
        ];
    }
    
    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_TEXT,
            'I' => NumberFormat::FORMAT_TEXT,
        ];
    }
}