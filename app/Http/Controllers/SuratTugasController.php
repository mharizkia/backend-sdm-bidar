<?php

namespace App\Http\Controllers;

use App\Models\SuratTugas;
use App\Models\User;
use Illuminate\Http\Request;

class SuratTugasController extends Controller
{
    public function index()
    {
        $suratTugas = SuratTugas::with('user')->latest()->get();
        return view('admin.surat.index', compact('suratTugas'));
    }

    public function create()
    {
        $pegawaiOptions = User::pluck('name', 'id');
        return view('admin.surat.create', compact('pegawaiOptions'));
    }

    public function show($id)
    {
        $suratTugas = SuratTugas::with('user')->findOrFail($id);
        return view('admin.surat.show', compact('suratTugas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'no_sk' => 'required|string',
            'tanggal_sk' => 'required|date',
            'keterangan' => 'required|string',
            'tenggat_waktu' => 'nullable|date',
        ]);
        SuratTugas::create($data);
        return redirect()->route('surat-tugas.index')->with('success', 'Surat tugas berhasil disimpan.');
    }

    public function edit($id)
    {
        $suratTugas = SuratTugas::findOrFail($id);
        $users = \App\Models\User::all();
        return view('admin.surat.edit', compact('suratTugas', 'users'));
    }

    public function update(Request $request, $id)
    {
        $suratTugas = SuratTugas::findOrFail($id);
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'no_sk' => 'required|string',
            'tanggal_sk' => 'required|date',
            'keterangan' => 'required|string',
            'tenggat_waktu' => 'nullable|date',
        ]);
        $suratTugas->update($data);
        return redirect()->route('surat-tugas.index')->with('success', 'Surat tugas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $suratTugas = SuratTugas::findOrFail($id);
        $suratTugas->delete();
        return redirect()->route('surat-tugas.index')->with('success', 'Surat tugas berhasil dihapus.');
    }
}