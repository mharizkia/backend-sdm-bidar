<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pewawancara;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PewawancaraController extends Controller
{
    public function index()
    {
        $pewawancaras = Pewawancara::all();

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
            'dokumen_pewawancara' => 'nullable|file|mimes:pdf|max:10248',
        ]);

        $file = $request->file('dokumen_pewawancara');

        $originalName = $file->getClientOriginalName();

        $path = $file->storeAs('pewawancara', $originalName, 'public');

        Pewawancara::create([
            'jabatan_pewawancara' => $request->jabatan_pewawancara,
            'dokumen_pewawancara' => $path,
        ]);

        return redirect()->route('admin.pewawancara.index')->with('success', 'Pewawancara created successfully.');
    }

    public function edit($id)
    {
        return view('admin.pewawancara.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the pewawancara data
        // Redirect or return a response
    }

    public function destroy($id)
    {
        // Delete the pewawancara data
        // Redirect or return a response
    }
}
