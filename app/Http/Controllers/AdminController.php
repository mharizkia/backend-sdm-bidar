<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Golongan;
use App\Models\JabatanAkademik;
use App\Models\Karyawan;
use App\Models\Pelamar;
use App\Models\Prodi;
use App\Models\Wawancara;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
        $karyawans = Karyawan::all();
        $pelamars = Pelamar::all();

        return view('admin.index');
    }
    
    public function createDosen()
    {
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        $jabatanAkademik = JabatanAkademik::all();
        $golongan = Golongan::all();

        return view('admin.create-dosen', compact('fakultas', 'prodi', 'jabatanAkademik', 'golongan'));
    }

    public function storedosen(Request $request)
    {
        $request->validate([
            'pelamar_id' => 'required',
            'kode_dosen' => 'required',
            'password' => 'required',
            'nik_ktp' => 'required',
            'nip' => 'required',
            'nidn' => 'required',
            'nama_dosen' => 'required',
            'gelar_depan' => 'required',
            'gelar_belakang' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'no_npwp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required',
            'agama' => 'required',
            'golongan_darah' => 'required|in:A,B,AB,O',
            'fakultas_id' => 'required|exists:fakultas,id',
            'prodi_id' => 'required|exists:prodis,id',
            'bidang_ilmu_kompetensi' => 'required',
            'ikatan_kerja' => 'required',
            'tanggal_mulai_kerja' => 'required|date',
            'pendidikan_tertinggi' => 'required',
            'jabatan_akademik_id' => 'required|exists:jabatan_akademiks,id',
            'golongan_id' => 'required|exists:golongans,id',
            'status_aktivasi' => 'required|in:aktif,nonaktif',
            'foto_dosen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'dokumen_dosen' => 'nullable|file|mimes:pdf|max:10248',
        ]);

        $dosen = new Dosen();

        
    }
}
