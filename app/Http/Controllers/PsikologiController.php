<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psikologi;
use App\Models\Pelamar;

class PsikologiController extends Controller
{
    public function index()
    {
        return view('pelamars.psikologi.index'); // Berisi Livewire component untuk tabel
    }

    public function create()
    {
        return view('pelamars.psikologi.create'); // Pasang Livewire create component
    }

    public function edit($id)
    {
        return view('pelamars.psikologi.edit', ['psikologiId' => $id]); // Pasang Livewire edit component
    }
}
