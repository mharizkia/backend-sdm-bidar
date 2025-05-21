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

    public function create(Request $request)
    {
        $pelamar = null;
        if ($request->kode) {
            $pelamar = Pelamar::where('kode', $request->kode)->first();
            if (!$pelamar) {
                session()->flash('not_found', 'Data pelamar tidak ditemukan.');
            }
        }

        return view('pelamars.wawancara.create', [
            'pelamar' => $pelamar,
            'daftarPewawancara' => Pewawancara::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelamar_id' => 'required|exists:pelamars,id',
            'pewawancara_id' => 'required|exists:pewawancaras,id',
            'nama_pewawancara' => 'required|string|max:255',
            'tanggal_wawancara' => 'required|date',
            'kesimpulan' => 'required|string|max:255',
            'hasil_wawancara' => 'required|file|mimes:pdf|max:10248',
            'status' => 'required|in:lulus,tidak_lulus',
        ]);

        $path = $request->file('hasil_wawancara')->store('hasil_wawancara', 'public');

        Wawancara::create([
            'pelamar_id' => $request->pelamar_id,
            'pewawancara_id' => $request->pewawancara_id,
            'nama_pewawancara' => $request->nama_pewawancara,
            'tanggal_wawancara' => $request->tanggal_wawancara,
            'kesimpulan' => $request->kesimpulan,
            'hasil_wawancara' => $path,
            'status' => $request->status,
        ]);

        return redirect()->route('wawancara.create')->with('success', 'Hasil wawancara berhasil disimpan.');
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
