<?php

namespace App\Livewire\Index;

use Livewire\Component;
use App\Models\Dosen;

class DosenIndex extends Component
{
    public $dosens;
    public $editId = null;

    public $nama_dosen, $nip, $nidn, $email, $no_hp;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->dosens = Dosen::all();
    }

    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        $this->editId = $id;
        $this->nama_dosen = $dosen->nama_dosen;
        $this->nip = $dosen->nip;
        $this->nidn = $dosen->nidn;
        $this->email = $dosen->email;
        $this->no_hp = $dosen->no_hp;
    }

    public function update()
    {
        $this->validate([
            'nama_dosen' => 'required',
            'email' => 'required|email',
        ]);

        $dosen = Dosen::findOrFail($this->editId);
        $dosen->update([
            'nama_dosen' => $this->nama_dosen,
            'nip' => $this->nip,
            'nidn' => $this->nidn,
            'email' => $this->email,
            'no_hp' => $this->no_hp,
        ]);

        session()->flash('message', 'Data dosen berhasil diperbarui.');

        $this->editId = null;
        $this->reset(['nama_dosen', 'nip', 'nidn', 'email', 'no_hp']);
        $this->loadData();
    }

    public function cancel()
    {
        $this->editId = null;
        $this->reset(['nama_dosen', 'nip', 'nidn', 'email', 'no_hp']);
    }

    public function render()
    {
        return view('livewire.index.dosen-index');
    }
}
