<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    public function index()
    {
        return view('dosen.index'); // Berisi Livewire component untuk tabel
    }

    public function create()
    {
        return view('dosen.create'); // Pasang Livewire create component
    }

    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.edit', compact('dosen')); // Pasang Livewire edit component
    }

    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'kode_dosen' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
            'nik_ktp' => 'nullable|string|max:20',
            'nip' => 'nullable|string|max:20',
            'nidn' => 'nullable|string|max:20',
            'nama_dosen' => 'required|string|max:255',
            'umur' => 'nullable|integer|min:0|max:120',
            'email' => 'required|email|max:255',
            'no_hp' => 'nullable|string|max:15',
            
        ]);
        $dosen->update($request->all());

        if ($request->filled('kode_dosen') && $request->filled('password')) {
            $user = $dosen->user ?? new User();

            $user->name = $request->nama_dosen;
            $user->email = $request->email;
            $user->kode = $request->kode_dosen;
            $user->password = Hash::make($request->password);
            $user->save();

            $user->syncRoles('dosen');
            $dosen->user_id = $user->id;
            $dosen->save();
        }

        return redirect()->route('dosen.index')->with('success', 'Dosen diperbarui.');
    }
}
