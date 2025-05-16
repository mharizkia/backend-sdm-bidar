<?php

namespace App\Livewire\Index;

use Livewire\Component;
use App\Models\Wawancara;

class WawancaraIndex extends Component
{
    public $listWawancara;

    public function mount()
    {
        $this->listWawancara = Wawancara::with(['pelamar', 'pewawancara'])->latest()->get();
    }

    public function render()
    {
        return view('livewire.index.wawancara-index');
    }
}
