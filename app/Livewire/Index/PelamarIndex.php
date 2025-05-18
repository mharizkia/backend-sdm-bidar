<?php

namespace App\Livewire\Index;

use Livewire\Component;
use App\Models\Pelamar;

class PelamarIndex extends Component
{
    public $listPelamar;

    public function mount()
    {
        $this -> listPelamar = Pelamar::with(['psikologi', 'wawancara'])->latest()->get();
    }

    public function render()
    {
        return view('livewire.index.pelamar-index');
    }
}
