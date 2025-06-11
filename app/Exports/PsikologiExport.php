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
        return Psikologi::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Pelamar ID',
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
            $psikologi->pelamar_id,
            $psikologi->tanggal_psikologis,
            $psikologi->hasil_psikologis,
            $psikologi->kesimpulan,
            $psikologi->status,
            $psikologi->created_at,
        ];
    }
}
