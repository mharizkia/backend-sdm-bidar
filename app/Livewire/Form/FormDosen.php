<?php

namespace App\Livewire\Form;

use App\Models\Dosen;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Golongan;
use App\Models\Fakultas;
use App\Models\JabatanAkademik;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class FormDosen extends Component
{
    public $kode_dosen, $password, $nama_dosen, $email, $status_aktivasi,
        $nik_ktp, $nip, $nidn, $umur, $gelar_depan, $gelar_belakang,
        $no_hp, $no_npwp, $tempat_lahir, $tanggal_lahir,
        $jenis_kelamin, $alamat, $agama, $golongan_darah, $bidang_ilmu_kompetensi,
        $ikatan_kerja, $tanggal_mulai_kerja,
        $pendidikan_tertinggi, $jabatan_akademik_id,
        $golongan_id, $foto_dosen, $dokumen_dosen;
    public $fakultas_id;
    public $prodi_id;
    public $fakultas = []; 
    public $jabatan_akademiks;
    public $prodis = [];
    public $golongans;

    public function mount()
    {
        $this->fakultas = Fakultas::all();
        $this->prodis = collect();
        $this->jabatan_akademiks = JabatanAkademik::all();
        $this->golongans = collect();
    }

    public function updatedFakultasId($value)
    {
        $this->prodis = Prodi::where('fakultas_id', $value)->get();
        $this->prodi_id = null;
    }

    public function updatedJabatanAkademikId($value)
    {
        $this->golongans = Golongan::where('jabatan_akademik_id', $value)->get();
        $this->golongan_id = null;
    }

    public function save()
    {
        $this->validate([
            'kode_dosen' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'nik_ktp' => 'nullable|string|max:20',
            'nip' => 'nullable|string|max:20',
            'nidn' => 'nullable|string|max:20',
            'nama_dosen' => 'required|string|max:255',
            'umur' => 'nullable|integer|min:0|max:120',
            'gelar_depan' => 'nullable|string|max:10',
            'gelar_belakang' => 'nullable|string|max:10',
            'email' => 'required|email|max:255',
            'no_hp' => 'nullable|string|max:15',
            'no_npwp' => 'nullable|string|max:20',
            'tempat_lahir' => 'nullable|string|max:50',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'alamat' => 'nullable|string|max:255',
            'agama' => 'nullable|string|max:20',
            'golongan_darah' => 'nullable|in:A,B,AB,O',
            'fakultas_id' => 'nullable|exists:fakultas,id',
            'prodi_id' => 'nullable|exists:prodis,id',
            'bidang_ilmu_kompetensi' => 'nullable|string|max:255',
            'ikatan_kerja' => 'nullable|string|max:50',
            'tanggal_mulai_kerja' => 'nullable|date',
            'pendidikan_tertinggi' => 'nullable|string|max:50',
            'jabatan_akademik_id' => 'nullable|exists:jabatan_akademiks,id',
            'golongan_id' => 'nullable|exists:golongans,id',
            'foto_dosen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'dokumen_dosen' => 'nullable|file|mimes:pdf,doc,docx|max:10248',
            'status_aktivasi' => 'required|in:aktif,tidak_aktif',
        ]);

        // Buat akun User jika status aktif
        $user = null;
        if ($this->status_aktivasi === 'aktif') {
            $user = User::create([
                'name' => $this->nama_dosen,
                'email' => $this->email,
                'kode' => $this->kode_dosen,
                'password' => Hash::make($this->password),
            ]);

            $user->assignRole('dosen');
        }

        $path_foto = $this->foto_dosen ? $this->foto_dosen->store('dosen/foto') : null;
        $path_dokumen = $this->dokumen_dosen ? $this->dokumen_dosen->store('dosen/dokumen') : null;

        // Simpan dosen
        Dosen::create([
            'kode_dosen' => $this->kode_dosen,
            'password' => $this->password,
            'nik_ktp' => $this->nik_ktp,
            'nip' => $this->nip,
            'nidn' => $this->nidn,
            'nama_dosen' => $this->nama_dosen,
            'umur' => $this->umur,
            'gelar_depan' => $this->gelar_depan,
            'gelar_belakang' => $this->gelar_belakang,
            'email' => $this->email,
            'no_hp' => $this->no_hp,
            'no_npwp' => $this->no_npwp,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
            'agama' => $this->agama,
            'golongan_darah' => $this->golongan_darah,
            'fakultas_id' => $this->fakultas_id,
            'prodi_id' => $this->prodi_id,
            'bidang_ilmu_kompetensi' => $this->bidang_ilmu_kompetensi,
            'ikatan_kerja' => $this->ikatan_kerja,
            'tanggal_mulai_kerja' => $this->tanggal_mulai_kerja,
            'pendidikan_tertinggi' => $this->pendidikan_tertinggi,
            'jabatan_akademik_id' => $this->jabatan_akademik_id,
            'golongan_id' => $this->golongan_id,
            'foto_dosen' => $path_foto,
            'dokumen_dosen' => $path_dokumen,
            'status_aktivasi' => $this->status_aktivasi,
            'user_id' => $user?->id,
        ]);

        session()->flash('success', 'Dosen berhasil ditambahkan.');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.form.form-dosen');
    }
}
