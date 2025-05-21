<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\User;
use App\Models\KatUnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all(); // Assuming you have a Karyawan model
        return view('admin.karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        $katunitkerja = KatUnitKerja::all(); // Assuming you have a KatUnitKerja model
        return view('admin.karyawan.create', compact('katunitkerja'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_karyawan' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'nik_ktp' => 'required|string|max:20',
            'nama_karyawan' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawans,email',
            'umur' => 'required|integer|min:18|max:100',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'agama' => 'required|string|max:50',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'required|string|max:20',
            'no_npwp' => 'nullable|string|max:20',
            'golongan_darah' => 'nullable|in:A,B,AB,O',
            'pendidikan_tertinggi' => 'required|string|max:255',
            'ikatan_kerja' => 'required|string|max:50',
            'jabatan' => 'required|string|max:50',
            'tanggal_mulai_kerja' => 'required|date',
            'kat_unit_kerja_id' => 'required|exists:kat_unit_kerjas,id',
            'status_aktivasi' => 'required|in:aktif,nonaktif',
            'foto_karyawan' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
            'dokumen_karyawan' => 'nullable|file|mimes:pdf|max:10248',
        ]);

        $pathFoto = $request->file('foto_karyawan') ? $request->file('foto_karyawan')->store('karyawan/foto') : null;
        $pathDokumen = $request->file('dokumen_karyawan') ? $request->file('dokumen_karyawan')->store('karyawan/dokumen') : null;

        $user = null; // Logic to create a user if needed
        if ($validated['status_aktivasi'] == 'aktif') {
            $user = User::create([
                'name' => $validated['nama_karyawan'],
                'email' => $validated['email'],
                'kode' => $validated['kode_karyawan'],
                'password' => Hash::make($validated['password']),
            ]);
            $user->assignRole('karyawan');
        }

        Karyawan::create([
            'kode_karyawan' => $validated['kode_karyawan'],
            'password' => Hash::make($validated['password']),
            'nik_ktp' => $validated['nik_ktp'] ?? null,
            'nama_karyawan' => $validated['nama_karyawan'],
            'email' => $validated['email'],
            'tempat_lahir' => $validated['tempat_lahir'] ?? null,
            'tanggal_lahir' => $validated['tanggal_lahir'] ?? null,
            'alamat' => $validated['alamat'] ?? null,
            'agama' => $validated['agama'] ?? null,
            'jenis_kelamin' => $validated['jenis_kelamin'] ?? null,
            'no_hp' => $validated['no_hp'] ?? null,
            'no_npwp' => $validated['no_npwp'] ?? null,
            'golongan_darah' => $validated['golongan_darah'] ?? null,
            'pendidikan_tertinggi' => $validated['pendidikan_tertinggi'] ?? null,
            'ikatan_kerja' => $validated['ikatan_kerja'] ?? null,
            'jabatan' => $validated['jabatan'] ?? null,
            'tanggal_mulai_kerja' => $validated['tanggal_mulai_kerja'] ?? null,
            'kat_unit_kerja_id' => $validated['kat_unit_kerja_id'] ?? null,
            'status_aktivasi' => $validated['status_aktivasi'] ?? null,
            'foto_karyawan' => $pathFoto,
            'dokumen_karyawan' => $pathDokumen,
            'user_id' => $user?->id,
        ]);
        
        return redirect()->route('admin.karyawan.index')->with('success', 'Karyawan created successfully.');
    }

    public function edit($id)
    {
        // Logic to show the form for editing an existing karyawan
        return view('admin.karyawan.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update an existing karyawan
        return redirect()->route('admin.karyawan.index')->with('success', 'Karyawan updated successfully.');
    }

    public function destroy($id)
    {
        // Logic to delete an existing karyawan
        return redirect()->route('admin.karyawan.index')->with('success', 'Karyawan deleted successfully.');
    }
}
