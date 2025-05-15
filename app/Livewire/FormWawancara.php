<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pelamar;
use App\Models\Pewawancara;
use App\Models\Wawancara;

class FormWawancara extends Component
{
    use WithFileUploads;

    public $kode, $pelamar, $pewawancara_id, $nama_pewawancara, $tanggal_wawancara, $poin_poin_wawancara, $kesimpulan,
           $previewPath;

    public $showdata = false;
    
    public function KodePelamar()
    {
        $this->pelamar = Pelamar::where('kode', $this->kode)->first();
    }

    public function FileHasil()
    {
        $this->previewPath = $this->poin_poin_wawancara->temporaryUrl();
    }

    public function simpan()
    {
        $this->validate([
            'pelamar_id' => 'required',
            'pewawancara_id' => 'required',
            'nama_pewawancara' => 'required|string|max:255',
            'tanggal_wawancara' => 'required|date',
            'poin_poin_wawancara' => 'required|file|mimes:pdf|max:10248',
            'kesimpulan' => 'required|string|max:255',
        ]);

        $path = $this->file_hasil->store('hasil_wawancara', 'public');

        Wawancara::create([
            'pelamar_id' => $this->pelamar->id,
            'pewawancara_id' => $this->pewawancara_id,
            'nama_pewawancara' => $this->nama_pewawancara,
            'tanggal_wawancara' => $this->tanggal_wawancara,
            'kesimpulan' => $this->kesimpulan,
            'poin_poin_wawancara' => $path,
        ]);

        session()->flash('success', 'Hasil wawancara berhasil diunggah.');
        $this->reset([
            'kode', 'pelamar', 'pewawancara_id', 'nama_pewawancara', 'tanggal_wawancara', 'poin_poin_wawancara', 'kesimpulan',
        ]);
    }

    public function render()
    {
        return view('livewire.form-wawancara', [
            'daftarPewawancara' => Pewawancara::all(),
        ]);
    }
}
