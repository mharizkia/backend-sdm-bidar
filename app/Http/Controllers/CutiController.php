<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class CutiController extends Controller
{
    public function index()
    {
        $cutis = Cuti::where('user_id', Auth::id())->get();
        return view('pegawai.cuti.index', compact('cutis'));
    }

    public function create()
    {
        return view('pegawai.cuti.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'tanggal_surat_pemohon' => 'required|date',
            'jenis_cuti' => 'required|string|max:255',
            'terhitung_mulai' => 'required|date',
            'terhitung_hingga' => 'required|date|after_or_equal:terhitung_mulai',
        ]);

        $user = Auth::user();
        $tipe = 'karyawan';
        if ($user instanceof \App\Models\User && $user->hasRole('dosen')) {
            $tipe = 'dosen';
        }

        Cuti::create([
            'user_id' => $user->id,
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'nama' => $user->name,
            'tipe' => $tipe,
            'tanggal_surat_pemohon' => $request->tanggal_surat_pemohon,
            'jenis_cuti' => $request->jenis_cuti,
            'terhitung_mulai' => $request->terhitung_mulai,
            'terhitung_hingga' => $request->terhitung_hingga,
            'status' => 'pending',
        ]);

        return redirect()->route('cuti.index')->with('success', 'Permohonan cuti dikirim.');
    }

    public function adminIndex()
    {
        $cutis = Cuti::latest()->get();
        return view('admin.cuti.index', compact('cutis'));
    }

    public function validateCuti($id, Request $request)
    {
        $request->validate(['status' => 'required|in:terima,tolak']);
        $cuti = Cuti::findOrFail($id);
        $cuti->status = $request->status;
        $cuti->save();

        return redirect()->back()->with('success', 'Status cuti diperbarui.');
    }
}