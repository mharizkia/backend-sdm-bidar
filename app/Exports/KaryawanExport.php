<?php

namespace App\Exports;

use App\Models\Karyawan; // Pastikan Anda memiliki model Karyawan
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class KaryawanExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithColumnFormatting
{

    public function collection()
    {
        return Karyawan::with('katUnitKerja')->get();
    }


    public function headings(): array
    {

        return [
            'Kode',                 // A
            'Nama',                 // B
            'Email',                // C
            'NIK',                  // D
            'Umur',                 // E
            'Alamat',               // F
            'Tempat Lahir',         // G
            'Tanggal Lahir',        // H
            'Jenis Kelamin',        // I
            'Golongan Darah',       // J
            'Agama',                // K
            'Nomor HP',             // L
            'Nomor NPWP',           // M
            'Pendidikan Tertinggi', // N
            'Ikatan Kerja',         // O
            'Akhir Ikatan Kerja',   // P
            'Jabatan',              // Q
            'Tanggal Mulai Kerja',  // R
            'Unit Kerja',           // S
            'Status Aktivasi',      // T
            'Profil Karyawan',      // U
            'Dokumen Karyawan',     // V
        ];
    }

 
    public function map($karyawan): array
    {
 
        $jenisKelamin = '-';
        if ($karyawan->jenis_kelamin == 'L') {
            $jenisKelamin = 'Laki-laki';
        } elseif ($karyawan->jenis_kelamin == 'P') {
            $jenisKelamin = 'Perempuan';
        }
        
    
        $statusAktivasi = ($karyawan->status_aktivasi == 'aktif') ? 'Aktif' : 'Tidak Aktif';


        return [
            $karyawan->kode_karyawan ?? '-',
            $karyawan->nama_karyawan ?? '-',
            $karyawan->email ?? '-',
            $karyawan->nik_ktp ?? '-',
            $karyawan->umur ?? '-',
            $karyawan->alamat ?? '-',
            $karyawan->tempat_lahir ?? '-',
            $karyawan->tanggal_lahir ? date('d-m-Y', strtotime($karyawan->tanggal_lahir)) : '-',
            $jenisKelamin,
            $karyawan->golongan_darah ?? '-',
            $karyawan->agama ?? '-',
            $karyawan->no_hp ?? '-',
            $karyawan->no_npwp ?? '-',
            $karyawan->pendidikan_tertinggi ?? '-',
            $karyawan->ikatan_kerja ?? '-',
            $karyawan->akhir_ikatan_kerja ? date('d-m-Y', strtotime($karyawan->akhir_ikatan_kerja)) : '-',
            $karyawan->jabatan ?? '-',
            $karyawan->tanggal_mulai_kerja ? date('d-m-Y', strtotime($karyawan->tanggal_mulai_kerja)) : '-',
            optional($karyawan->katUnitKerja)->nama_kat_unit_kerja ?? '-',
            $statusAktivasi,
            $karyawan->foto_karyawan ? url('storage/' . $karyawan->foto_karyawan) : 'Tidak ada foto',
            $karyawan->dokumen_karyawan ? url('storage/' . $karyawan->dokumen_karyawan) : 'Tidak ada dokumen',
        ];
    }


    public function columnFormats(): array
    {

        return [
            'D' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER, // NIK
            'L' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT, // Nomor HP
            'M' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT, // Nomor NPWP
        ];
    }
}