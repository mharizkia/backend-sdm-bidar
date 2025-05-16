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

    public $kode;
    public $pelamar;
    public $pewawancara_id;
    public $nama_pewawancara;
    public $tanggal_wawancara;
    public $kesimpulan;
    public $status;
    public $poin_poin_wawancara;
    public $previewPath;
    public $showPanduan = false;

    public function updatedPoinPoinWawancara()
    {
        if ($this->poin_poin_wawancara) {
            $this->previewPath = $this->poin_poin_wawancara->temporaryUrl();
        }
    }

    public function cariPelamar()
    {
        $this->pelamar = Pelamar::where('kode', $this->kode)->first();

        if (!$this->pelamar) {
            session()->flash('not_found', 'Data pelamar tidak ditemukan.');
        } else {
            session()->forget('not_found');
        }
    }

    public function tampilkanPanduan()
    {
        $this->showPanduan = true;
    }

    public function simpan()
    {
        $this->validate([
            'pewawancara_id' => 'required|exists:pewawancaras,id',
            'nama_pewawancara' => 'required|string|max:255',
            'tanggal_wawancara' => 'required|date',
            'kesimpulan' => 'required|string|max:255',
            'poin_poin_wawancara' => 'required|file|mimes:pdf|max:10248',
            'status' => 'required|in:lulus,tidak_lulus',
        ]);

        $path = $this->poin_poin_wawancara->store('hasil_wawancara', 'public');

        Wawancara::create([
            'pelamar_id' => $this->pelamar->id,
            'pewawancara_id' => $this->pewawancara_id,
            'nama_pewawancara' => $this->nama_pewawancara,
            'tanggal_wawancara' => $this->tanggal_wawancara,
            'kesimpulan' => $this->kesimpulan,
            'poin_poin_wawancara' => $path,
            'status' => $this->status,
        ]);

        session()->flash('success', 'Hasil wawancara berhasil disimpan.');

        $this->reset([
            'kode', 'pelamar', 'pewawancara_id', 'nama_pewawancara',
            'tanggal_wawancara', 'kesimpulan', 'poin_poin_wawancara',
            'previewPath', 'showPanduan', 'status',
        ]);
    }

    public function render()
    {
        return view('livewire.form-wawancara', [
            'daftarPewawancara' => Pewawancara::all(),
        ]);
    }
}
