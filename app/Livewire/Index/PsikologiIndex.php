<?php

namespace App\Livewire\Index;

use Livewire\Component;
use App\Models\Psikologi;

class PsikologiIndex extends Component
{
    public $listPsikologi;

    public function mount()
    {
        $this->listPsikologi = Psikologi::with(['pelamar'])->latest()->get();
    }

    public function render()
    {
        return view('livewire.index.psikologi-index');
    }
}
