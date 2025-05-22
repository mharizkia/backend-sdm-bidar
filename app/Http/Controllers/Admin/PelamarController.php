<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Pelamar;
use App\Models\Dosen;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class PelamarController extends Controller
{
    public function index()
    {
        $pelamars = Pelamar::whereNull('status')->get();
        return view('admin.pelamar.index', compact('pelamars'));
    }
    public function create()
    {
        return view('admin.pelamar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelamar' => 'required|string|max:255',
            'nidn' => 'nullable|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'email' => 'required|email|unique:pelamars,email',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'pendidikan_tertinggi' => 'required|string|max:255',
            'umur' => 'required|integer|min:0',
            'ipk' => 'required|numeric|min:0|max:4',
            'bidang_ilmu_kompetensi' => 'required|string|max:255',
            'pilihan_lamaran' => 'required|in:dosen,karyawan',
            'tanggal_lamaran' => 'required|date',
            'dokumen_lamaran' => 'required|file|mimes:pdf|max:10248',
        ]);

        // Buat kode pelamar (D-xxxx atau K-xxxx)
        $count = Pelamar::where('pilihan_lamaran', $request->pilihan_lamaran)->count() + 1;
        $kode = strtoupper(substr($request->pilihan_lamaran, 0, 1)) . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);

        // Simpan file
        $path = $request->file('dokumen_lamaran')->store('pdfs', 'public');

        Pelamar::create([
            'kode' => $kode,
            'nama_pelamar' => $request->nama_pelamar,
            'nidn' => $request->nidn,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'pendidikan_tertinggi' => $request->pendidikan_tertinggi,
            'umur' => $request->umur,
            'ipk' => $request->ipk,
            'bidang_ilmu_kompetensi' => $request->bidang_ilmu_kompetensi,
            'pilihan_lamaran' => $request->pilihan_lamaran,
            'tanggal_lamaran' => $request->tanggal_lamaran,
            'dokumen_lamaran' => $path,
            'status' => $request->status,
        ]);

        return redirect()->route('pelamar.index')->back()->with('message', 'Data pelamar berhasil disimpan!');
    }

    public function konfirmasi(Request $request, $id)
    {
        $status = $request->input('status');

        if (!$status) {
            return redirect()->route('admin.pelamar.index')
                ->with('message', 'Silakan pilih status terlebih dahulu.');
        }

        $pelamar = Pelamar::findOrFail($id);

        if ($status === 'terima') {
            if ($pelamar->pilihan_lamaran === 'dosen' && !$pelamar->dosen) {
                Dosen::create([
                    'pelamar_id' => $pelamar->id,
                    'nama_dosen' => $pelamar->nama_pelamar,
                    'kode_dosen' => '',
                    'nik_ktp' => '',
                    'nip' => '',
                    'nidn' => '',
                    'umur' => $pelamar->umur,
                    'gelar_depan' => '',
                    'gelar_belakang' => '',
                    'email' => $pelamar->email,
                    'no_hp' => $pelamar->no_hp,
                    'no_npwp' => '',
                    'tempat_lahir' => $pelamar->tempat_lahir,
                    'tanggal_lahir' => $pelamar->tanggal_lahir,
                    'jenis_kelamin' => $pelamar->jenis_kelamin,
                    'alamat' => $pelamar->alamat,
                    'agama' => '',
                    'golongan_darah' => null,
                    'fakultas_id' => null,
                    'prodi_id' => null,
                    'bidang_ilmu_kompetensi' => $pelamar->bidang_ilmu_kompetensi,
                    'ikatan_kerja' => '',
                    'tanggal_mulai_kerja' => null,
                    'pendidikan_tertinggi' => $pelamar->pendidikan_tertinggi,
                    'jabatan_akademik_id' => null,
                    'golongan_id' => null,
                    'status_aktivasi' => null,
                    'foto_dosen' => '',
                    'dokumen_dosen' => '',
                ]);
            } elseif ($pelamar->pilihan_lamaran === 'karyawan' && !$pelamar->karyawan) {
                Karyawan::create([
                    'pelamar_id' => $pelamar->id,
                    'nama_karyawan' => $pelamar->nama_pelamar,
                    'kode_karyawan' => '',
                    'password' => '',
                    'nik_ktp' => '',
                    'email' => $pelamar->email,
                    'tempat_lahir' => $pelamar->tempat_lahir,
                    'tanggal_lahir' => $pelamar->tanggal_lahir,
                    'alamat' => $pelamar->alamat,
                    'agama' => '',
                    'jenis_kelamin' => $pelamar->jenis_kelamin,
                    'no_hp' => $pelamar->no_hp,
                    'no_npwp' => '',
                    'golongan_darah' => null,
                    'pendidikan_tertinggi' => $pelamar->pendidikan_tertinggi,
                    'ikatan_kerja' => '',
                    'tanggal_mulai_kerja' => null,
                    'jabatan' => '',
                    'kat_unit_kerja_id' => null,
                    'status_aktivasi' => null,
                    'foto_karyawan' => '',
                    'dokumen_karyawan' => '',
                ]);
            }
        }

        $pelamar->update(['status' => $status]);

        return redirect()->route('pelamar.index')
            ->with('message', "Pelamar berhasil dikonfirmasi sebagai: $status.");
    }
}
