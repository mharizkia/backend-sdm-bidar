<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\PsikologiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Psikologi;
use App\Models\Pelamar;

class PsikologiController extends Controller
{
    public function index()
    {
        $psikologis = Psikologi::with('pelamar')->latest()->get();
        return view('admin.psikologi.index', compact('psikologis'));
    }

    public function create(Request $request)
    {
        $pelamar = null;
            if ($request->kode) {
                $pelamar = Pelamar::where('kode', $request->kode)->first();
                if (!$pelamar) {
                    session()->flash('not_found', 'Pelamar tidak ditemukan.');
                } else {
                    $wawancara = $pelamar->wawancara()->latest()->first();
                    if (!$wawancara || $wawancara->status !== 'lulus') {
                        return redirect()->route('psikologi.index')->with('error', 'Pelamar belum lulus wawancara.');
                    }
                }
            }

        return view('admin.psikologi.create', [
            'pelamar' => $pelamar,
            'poinPsikologisPath' => 'psikologis/poin_psikologis.pdf',
        ]);
    }

    public function store(Request $request)
    {
        $pelamar = Pelamar::findOrFail($request->pelamar_id);
        $wawancara = $pelamar->wawancara()->latest()->first();
        if (!$wawancara || $wawancara->status !== 'lulus') {
            return redirect()->route('psikologi.index')->with('error', 'Pelamar belum lulus wawancara.');
        }
        
        $request->validate([
            'pelamar_id' => 'required|exists:pelamars,id',
            'tanggal_psikologis' => 'required|date',
            'hasil_psikologis' => 'required|file|mimes:pdf|max:10248',
            'kesimpulan' => 'required|string|max:255',
            'status' => 'required|in:lulus,tidak_lulus',
        ]);

        $path = $request->file('hasil_psikologis')->store('hasil_psikologis', 'public');

        Psikologi::create([
            'pelamar_id' => $request->pelamar_id,
            'tanggal_psikologis' => $request->tanggal_psikologis,
            'poin_poin_psikologis' => 'psikologis/poin_psikologis.pdf',
            'hasil_psikologis' => $path,
            'kesimpulan' => $request->kesimpulan,
            'status' => $request->status,
        ]);

        return redirect()->route('psikologi.index')->with('success', 'Data psikologis berhasil disimpan.');
    }

    public function show($id)
    {
        $psikologi = Psikologi::with('pelamar')->findOrFail($id);
        return view('admin.psikologi.show', compact('psikologi'));
    }

    public function edit($id)
    {
        $psikologi = Psikologi::with('pelamar')->findOrFail($id);
        return view('admin.psikologi.edit', compact('psikologi'));
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

    public function destroy($id)
    {
        $psikologi = Psikologi::findOrFail($id);
        $psikologi->delete();
        return redirect()->route('psikologi.index')->with('success', 'Data psikologis berhasil dihapus.');
    }

    public function export()
    {
        return Excel::download(new PsikologiExport, 'daftar_psikologi.xlsx');
    }
}
