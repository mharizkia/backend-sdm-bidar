<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wawancara;
use App\Models\Pelamar;
use App\Models\Psikologi;

class PelamarController extends Controller
{
    public function index()
    {
        return view('pelamars.pelamar.index'); // Berisi Livewire component untuk tabel
    }

    public function create()
    {
        return view('pelamars.pelamar.create'); // Pasang Livewire create component
    }
}
