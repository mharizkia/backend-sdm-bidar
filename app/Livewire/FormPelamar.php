<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pelamar;

class FormPelamar extends Component
{
    public $nama, $email, $telepon, $tipe;

    public function render()
    {
        return view('livewire.form-pelamar'); // tanpa layout()
    }

    public function simpan()
    {
        $this->validate([
            'kode' => 'required|string|max:255',
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
            'pilihan_lamaran' => 'required|string|max:255',
            'tanggal_lamaran' => 'required|date',
            'dokumen_lamaran' => 'required|file|mimes:pdf,doc,docx|max:10248',
            'status' => 'boolean',
        ]);

        $nomor = Pelamar::where('tipe', $this->tipe)->count() + 1;
        $kode = strtoupper(substr($this->tipe, 0, 1)) . '-' . str_pad($nomor, 4, '0', STR_PAD_LEFT);

        Pelamar::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'telepon' => $this->telepon,
            'tipe' => $this->tipe,
            'kode' => $kode,
        ]);

        session()->flash('message', 'Data pelamar berhasil disimpan!');

        $this->reset(['nama', 'email', 'telepon', 'tipe']);
    }
}
