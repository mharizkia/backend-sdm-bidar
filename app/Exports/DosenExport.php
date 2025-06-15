<?php

namespace App\Exports;

use App\Models\Dosen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class DosenExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithColumnFormatting
{

    public function collection()
    {
        return Dosen::with(['fakultas', 'prodi', 'jabatanAkademik', 'golongan'])->get();
    }

    public function headings(): array
    {
        return [
            'ID Dosen',
            'Kode Dosen',
            'NIK KTP',             
            'NIP',       
            'NIDN',              
            'Nama Dosen',
            'Umur',
            'Gelar Depan',
            'Gelar Belakang',
            'Email',
            'No. HP',              
            'No. NPWP',      
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Alamat',
            'Agama',
            'Golongan Darah',
            'Fakultas',
            'Prodi',
            'Bidang Ilmu Kompetensi',
            'Ikatan Kerja',
            'Akhir Ikatan Kerja',
            'Tanggal Mulai Kerja',
            'Pendidikan Tertinggi',
            'Jabatan Akademik',
            'Golongan',
            'Status Aktivasi',
            'Link Foto Dosen',
            'Link Dokumen Dosen',
            'Tanggal Dibuat',
            'Tanggal Diperbarui',
        ];
    }

    public function map($dosen): array
    {
        $jenisKelamin = '-';
        if ($dosen->jenis_kelamin == 'L') {
            $jenisKelamin = 'Laki-laki';
        } elseif ($dosen->jenis_kelamin == 'P') {
            $jenisKelamin = 'Perempuan';
        }

        return [
            $dosen->id ?? '-',
            $dosen->kode_dosen ?? '-',
            $dosen->nik_ktp ?? '-',
            $dosen->nip ?? '-',
            $dosen->nidn ?? '-',
            $dosen->nama_dosen ?? '-',
            $dosen->umur ?? '-',
            $dosen->gelar_depan ?? '-',
            $dosen->gelar_belakang ?? '-',
            $dosen->email ?? '-',
            $dosen->no_hp ?? '-',
            $dosen->no_npwp ?? '-',
            $dosen->tempat_lahir ?? '-',
            $dosen->tanggal_lahir ? date('d-m-Y', strtotime($dosen->tanggal_lahir)) : '-',
            $jenisKelamin,
            $dosen->alamat ?? '-',
            $dosen->agama ?? '-',
            $dosen->golongan_darah ?? '-',
            optional($dosen->fakultas)->nama_fakultas ?? '-',
            optional($dosen->prodi)->nama_prodi ?? '-',
            $dosen->bidang_ilmu_kompetensi ?? '-',
            $dosen->ikatan_kerja ?? '-',
            $dosen->akhir_ikatan_kerja ? date('d-m-Y', strtotime($dosen->akhir_ikatan_kerja)) : '-',
            $dosen->tanggal_mulai_kerja ? date('d-m-Y', strtotime($dosen->tanggal_mulai_kerja)) : '-',
            $dosen->pendidikan_tertinggi ?? '-',
            optional($dosen->jabatanAkademik)->nama_jabatan_akademik ?? '-',
            optional($dosen->golongan)->nama_golongan ?? '-',
            $dosen->status_aktivasi ? ucfirst($dosen->status_aktivasi) : '-',
            $dosen->foto_dosen ? url('storage/' . $dosen->foto_dosen) : 'Tidak ada foto',
            $dosen->dokumen_dosen ? url('storage/' . $dosen->dokumen_dosen) : 'Tidak ada dokumen',
            $dosen->created_at ? $dosen->created_at->format('d-m-Y H:i:s') : '-',
            $dosen->updated_at ? $dosen->updated_at->format('d-m-Y H:i:s') : '-',
        ];
    }
    

    public function columnFormats(): array
    {

        return [
            'C' => NumberFormat::FORMAT_NUMBER, // NIK KTP
            'D' => NumberFormat::FORMAT_NUMBER, // NIP
            'E' => NumberFormat::FORMAT_TEXT, // NIDN
            'K' => NumberFormat::FORMAT_TEXT, // No. HP
            'L' => NumberFormat::FORMAT_TEXT, // No. NPWP
        ];
    }
}
