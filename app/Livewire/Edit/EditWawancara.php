<?php

namespace App\Livewire\Edit;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Wawancara;
use App\Models\Pewawancara;

class EditWawancara extends Component
{
    use WithFileUploads;

    public $wawancaraId, $wawancara;
    public $pelamar, $pewawancara_id, $nama_pewawancara, $tanggal_wawancara,
           $kesimpulan, $status, $poin_poin_wawancara, $previewPath;

    public function mount($wawancaraId)
    {
        $this->wawancara = Wawancara::findOrFail($wawancaraId);
        $this->pelamar = $this->wawancara->pelamar_id;
        $this->fill($this->wawancara->toArray());
    }

    public function update()
    {
        $this->validate([
            'pewawancara_id' => 'required',
            'nama_pewawancara' => 'required',
        ]);

        if ($this->poin_poin_wawancara) {
            $path = $this->poin_poin_wawancara->store('hasil_wawancara', 'public');
            $this->wawancara->poin_poin_wawancara = $path;
        }

        $this->wawancara->fill([
            'pewawancara_id' => $this->pewawancara_id,
            'nama_pewawancara' => $this->nama_pewawancara,
            'tanggal_wawancara' => $this->tanggal_wawancara,
            'kesimpulan' => $this->kesimpulan,
            'status' => $this->status,
        ])->save();

        session()->flash('success', 'Wawancara diperbarui.');
    }

    public function render()
    {
        return view('livewire.edit.edit-wawancara', [
            'daftarPewawancara' => Pewawancara::all(),
        ]);
    }
}
