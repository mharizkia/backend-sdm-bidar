<?php

namespace App\Http\Controllers;

use App\Models\Dosen;

class DosenController extends Controller
{
    public function index()
    {
        return view('dosen.index'); // Berisi Livewire component untuk tabel
    }

    public function edit($id)
    {
        return view('dosen.edit', ['dosenId' => $id]); // Pasang Livewire edit component
    }
}
