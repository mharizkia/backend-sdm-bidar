<?php

namespace App\Livewire\Form;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pelamar;
use App\Models\Pewawancara;
use App\Models\Wawancara;
use Illuminate\Support\Facades\Storage;

class FormWawancara extends Component
{
    use WithFileUploads;

    public  $kode, $pelamar, $pewawancara_id, $nama_pewawancara, $tanggal_wawancara,
            $kesimpulan, $status, $hasil_wawancara;
            
    public $previewPath;
    public $showPanduan = false;

    public function updatedHasilWawancara()
    {
        if ($this->hasil_wawancara) {
            $path = $this->hasil_wawancara->store('hasil_wawancara_preview', 'public');
            $this->previewPath = asset('storage/' . $path);
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
            'hasil_wawancara' => 'required|file|mimes:pdf|max:10248',
            'status' => 'required|in:lulus,tidak_lulus',
        ]);

        $path = $this->hasil_wawancara->store('hasil_wawancara', 'public');

        Wawancara::create([
            'pelamar_id' => $this->pelamar->id,
            'pewawancara_id' => $this->pewawancara_id,
            'nama_pewawancara' => $this->nama_pewawancara,
            'tanggal_wawancara' => $this->tanggal_wawancara,
            'kesimpulan' => $this->kesimpulan,
            'hasil_wawancara' => $path,
            'status' => $this->status,
        ]);

        session()->flash('success', 'Hasil wawancara berhasil disimpan.');

        Storage::disk('public')->deleteDirectory('hasil_wawancara_preview');

        $this->reset([
            'kode', 'pelamar', 'pewawancara_id', 'nama_pewawancara',
            'tanggal_wawancara', 'kesimpulan', 'hasil_wawancara',
            'previewPath', 'showPanduan', 'status',
        ]);
    }

    public function render()
    {
        return view('livewire.form.form-wawancara', [
            'daftarPewawancara' => Pewawancara::all(),
        ]);
    }
}
