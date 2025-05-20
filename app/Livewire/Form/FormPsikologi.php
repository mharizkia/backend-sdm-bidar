<?php

namespace App\Livewire\Form;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pelamar;
use App\Models\Psikologi;
use Illuminate\Support\Facades\Storage;

class FormPsikologi extends Component
{
    use WithFileUploads;

    public $kode, $pelamar, $tanggal_psikologis, $hasil_psikologis, $kesimpulan, $status;

    public $previewPath;
    public $poin_poin_psikologis_path = 'psikologis/poin_psikologis.pdf';

    public function updatedKode()
    {
        $this->cariPelamar();
    }

    public function updatedHasilpsikologis()
    {
        if ($this->hasil_psikologis) {
            $path = $this->hasil_psikologis->store('hasil_psikologis_preview', 'public');
            $this->previewPath = asset('storage/' . $path);
        }
    }

    public function cariPelamar()
    {
        $this->pelamar = Pelamar::where('kode', $this->kode)->first();
        if (!$this->pelamar) {
            session()->flash('not_found', 'Pelamar tidak ditemukan.');
        } else {
            session()->forget('not_found');
        }
    }

    public function simpan()
    {
        $this->validate([
            'tanggal_psikologis' => 'required|date',
            'hasil_psikologis' => 'required|file|mimes:pdf|max:10248',
            'kesimpulan' => 'required|string|max:255',
            'status' => 'required|in:lulus,tidak_lulus',
        ]);

        $path = $this->hasil_psikologis->store('hasil_psikologis', 'public');

        Psikologi::create([
            'pelamar_id' => $this->pelamar->id,
            'tanggal_psikologis' => $this->tanggal_psikologis,
            'poin_poin_psikologis' => $this->poin_poin_psikologis_path,
            'hasil_psikologis' => $path,
            'kesimpulan' => $this->kesimpulan,
            'status' => $this->status,
        ]);

        session()->flash('success', 'Data psikologis berhasil disimpan.');

        Storage::disk('public')->deleteDirectory('hasil_psikologis_preview');

        $this->reset(['kode', 'pelamar', 'tanggal_psikologis', 'hasil_psikologis', 'kesimpulan', 'status', 'previewPath']);
    }

    public function render()
    {
        return view('livewire.form.form-psikologi');
    }
}
