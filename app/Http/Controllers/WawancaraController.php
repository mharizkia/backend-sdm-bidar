<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wawancara;
use App\Models\Pelamar;
use App\Models\Pewawancara;


class WawancaraController extends Controller
{
    public function index()
    {
        return view('pelamars.wawancara.index'); // Berisi Livewire component untuk tabel
    }

    public function create()
    {
        return view('pelamars.wawancara.create'); // Pasang Livewire create component
    }

    public function edit($id)
    {
        $wawancara = Wawancara::with('pelamar')->findOrFail($id);
        $daftarPewawancara = Pewawancara::all();

        return view('pelamars.wawancara.edit', compact('wawancara', 'daftarPewawancara')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pewawancara_id' => 'required|exists:pewawancaras,id',
            'nama_pewawancara' => 'required|string|max:255',
            'tanggal_wawancara' => 'required|date',
            'poin_poin_wawancara' => 'nullable|file|mimes:pdf|max:10248',
            'kesimpulan' => 'required|string|max:255',
            'status' => 'required|in:lulus,tidak_lulus',
        ]);

        $wawancara = Wawancara::findOrFail($id);
        
        if ($request->hasFile('poin_poin_wawancara')) {
            $path = $request->file('poin_poin_wawancara')->store('hasil_wawancara', 'public');
            $wawancara->poin_poin_wawancara = $path;
        }

        $wawancara->update([
            'pewawancara_id' => $request->pewawancara_id,
            'nama_pewawancara' => $request->nama_pewawancara,
            'tanggal_wawancara' => $request->tanggal_wawancara,
            'kesimpulan' => $request->kesimpulan,
            'status' => $request->status,
        ]);

        return redirect()->route('wawancara.index')->with('success', 'Wawancara updated successfully.');
    }
}
