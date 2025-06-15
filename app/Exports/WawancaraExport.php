<?php

namespace App\Exports;

use App\Models\Wawancara;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class WawancaraExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{

    public function collection()
    {
        return Wawancara::all();
    }

    public function headings(): array
    {
        return [
            'ID Wawancara',
            'ID Pelamar',
            'Nama Pewawancara',
            'Tanggal Wawancara',
            'Hasil Wawancara',
            'Kesimpulan',
            'ID Pewawancara',
            'Status',
            'Tanggal Dibuat',
        ];
    }

    public function map($wawancara): array
    {
        return [
            $wawancara->id,
            $wawancara->pelamar_id ?? '-',
            $wawancara->nama_pewawancara ?? '-',
            $wawancara->tanggal_wawancara ?? '-',
            $wawancara->hasil_wawancara ?? '-',
            $wawancara->kesimpulan ?? '-',
            $wawancara->pewawancara_id ?? '-',
            $wawancara->status ?? '-',
            $wawancara->created_at->format('d-m-Y'),
        ];
    }
}
