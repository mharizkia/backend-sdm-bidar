<?php

namespace App\Exports;

use App\Models\Psikologi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PsikologiExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{

    public function collection()
    {
        return Psikologi::with('pelamar')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Pelamar',
            'Tanggal Psikologi',
            'Hasil Psikologi',
            'Kesimpulan',
            'Status',
            'Tanggal Dibuat',
        ];
    }

 
    public function map($psikologi): array
    {
        return [
            $psikologi->id,
            optional($psikologi->pelamar)->nama_pelamar ?? '-',
            $psikologi->tanggal_psikologis ? date('d-m-Y', strtotime($psikologi->tanggal_psikologis)) : '-',
            $psikologi->hasil_psikologis ?? '-',
            $psikologi->kesimpulan ?? '-',
            $psikologi->status ?? '-',
            $psikologi->created_at->format('d-m-Y H:i:s'),
        ];
    }
}
