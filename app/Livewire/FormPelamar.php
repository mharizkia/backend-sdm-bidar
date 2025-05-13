<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pelamar;
use Illuminate\Http\Request;

class FormPelamar extends Component
{
    use WithFileUploads;

    public  $nama_pelamar, $nidn, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, 
            $email, $no_hp, $alamat, $pendidikan_tertinggi, $usia, $ipk,
            $bidang_ilmu_kompetensi, $pilihan_lamaran, $tanggal_lamaran, $dokumen_lamaran, $status;
    

    public function render()
    {
        return view('livewire.form-pelamar'); // tanpa layout()
    }

    public function simpan(Request $request)
    {
        $this->validate([
            'nama_pelamar' => 'required|string|max:255',
            'nidn' => 'nullable|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'email' => 'required|email|unique:pelamars,email',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'pendidikan_tertinggi' => 'required|string|max:255',
            'usia' => 'required|integer|min:0',
            'ipk' => 'required|numeric|min:0|max:4',
            'bidang_ilmu_kompetensi' => 'required|string|max:255',
            'pilihan_lamaran' => 'required|in:dosen,karyawan',
            'tanggal_lamaran' => 'required|date',
            'dokumen_lamaran' => 'required|file|mimes:pdf|max:10248',
            'status' => 'boolean',
        ]);

        $nomor = Pelamar::where('pilihan_lamaran', $this->pilihan_lamaran)->count() + 1;
        $kode = strtoupper(substr($this->pilihan_lamaran, 0, 1)) . '-' . str_pad($nomor, 4, '0', STR_PAD_LEFT);

        $path = $this->dokumen_lamaran->store('pdfs', 'public');

        Pelamar::create([
            'kode' => $kode,
            'nama_pelamar' => $this->nama_pelamar,
            'nidn' => $this->nidn,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'email' => $this->email,
            'no_hp' => $this->no_hp,
            'alamat' => $this->alamat,
            'pendidikan_tertinggi' => $this->pendidikan_tertinggi,
            'usia' => $this->usia,
            'ipk' => $this->ipk,
            'bidang_ilmu_kompetensi' => $this->bidang_ilmu_kompetensi,
            'pilihan_lamaran' => $this->pilihan_lamaran,
            'tanggal_lamaran' => $this->tanggal_lamaran,
            'dokumen_lamaran' => $path,
            'status' => $this->$status,
        ]);

        session()->flash('message', 'Data pelamar berhasil disimpan!');

        $this->reset([
            'nama_pelamar', 'nidn', 'tempat_lahir', 'tanggal_lahir', 
            'jenis_kelamin', 'email', 'no_hp', 'alamat', 'pendidikan_tertinggi', 
            'usia', 'ipk', 'bidang_ilmu_kompetensi', 'pilihan_lamaran', 
            'tanggal_lamaran', 'dokumen_lamaran'
        ]);
    }
}
