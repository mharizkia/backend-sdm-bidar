<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pewawancara;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class PewawancaraController extends Controller
{
    public function index()
    {
        $pewawancaras = Pewawancara::latest()->paginate(10);
        return view('admin.pewawancara.index', compact('pewawancaras'));
    }

    public function create()
    {
        return view('admin.pewawancara.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan_pewawancara' => 'required|string|max:255',
            'dokumen_pewawancara' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $path = null;
        if ($request->hasFile('dokumen_pewawancara')) {
            $file = $request->file('dokumen_pewawancara');
            $originalName = $file->getClientOriginalName();
            $path = $file->storeAs('dokumen_pewawancara', $originalName, 'public');
        }

        Pewawancara::create([
            'jabatan_pewawancara' => $request->jabatan_pewawancara,
            'dokumen_pewawancara' => $path,
        ]);

        return redirect()->route('pewawancara.index')->with('success', 'Pewawancara berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pewawancara = Pewawancara::findOrFail($id);
        return view('admin.pewawancara.edit', compact('pewawancara'));
    }

    public function update(Request $request, $id)
    {
        $pewawancara = Pewawancara::findOrFail($id);
        
        $request->validate([
            'jabatan_pewawancara' => 'required|string|max:255',
            'dokumen_pewawancara' => 'nullable|file|mimes:pdf|max:10240',
        ]);
        
        $path = $pewawancara->dokumen_pewawancara;

        if ($request->hasFile('dokumen_pewawancara')) {
            if ($pewawancara->dokumen_pewawancara) {
                Storage::disk('public')->delete($pewawancara->dokumen_pewawancara);
            }
            
            $file = $request->file('dokumen_pewawancara');
            $originalName = $file->getClientOriginalName();
            $path = $file->storeAs('dokumen_pewawancara', $originalName, 'public');
        }

        $pewawancara->update([
            'jabatan_pewawancara' => $request->jabatan_pewawancara,
            'dokumen_pewawancara' => $path,
        ]);

        return redirect()->route('pewawancara.index')->with('success', 'Data pewawancara berhasil diupdate.');
    }

    public function destroy($id)
    {
        $pewawancara = Pewawancara::findOrFail($id);

        if ($pewawancara->dokumen_pewawancara) {
            Storage::disk('public')->delete($pewawancara->dokumen_pewawancara);
        }

        $pewawancara->delete();

        return redirect()->route('pewawancara.index')->with('success', 'Data pewawancara berhasil dihapus.');
    }
}
