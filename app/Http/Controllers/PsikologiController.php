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
        $psikologi = Psikologi::with('pelamar')->findOrFail($id);
        return view('pelamars.psikologi.edit', compact('psikologi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_psikologis' => 'required|date',
            'hasil_psikologis' => 'nullable|file|mimes:pdf|max:10248',
            'kesimpulan' => 'required|string|max:255',
            'status' => 'required|in:lulus,tidak_lulus',
        ]);

        $psikologi = Psikologi::findOrFail($id);
        
        if ($request->hasFile('hasil_psikologis')) {
            $path = $request->file('hasil_psikologis')->store('hasil_psikologis', 'public');
            $psikologi->hasil_psikologis = $path;
        }

        $psikologi->update([
            'tanggal_psikologis' => $request->tanggal_psikologis,
            'kesimpulan' => $request->kesimpulan,
            'status' => $request->status,
        ]);

        return redirect()->route('psikologi.index')->with('success', 'Psikologi updated successfully.');
    }
}
