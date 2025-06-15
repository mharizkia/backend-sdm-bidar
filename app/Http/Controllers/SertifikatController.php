<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SertifikatController extends Controller
{
    public function index()
    {
        $sertifikats = Sertifikat::where('user_id', Auth::id())->get();
        return view('pegawai.sertifikat.index', compact('sertifikats'));
    }

    public function create()
    {
        return view('pegawai.sertifikat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'lembaga' => 'required|string',
            'nomor_registrasi' => 'required|string',
            'no_sertifikat' => 'required|string',
            'tanggal_sertifikat' => 'required|date',
            'tmt_sertifikat' => 'required|string',
            'file_sertifikat' => 'nullable|file|mimes:pdf,jpg,png',
        ]);

        if ($request->hasFile('file_sertifikat')) {
            $validated['file_sertifikat'] = $request->file('file_sertifikat')->store('sertifikat', 'public');
        }

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'pending';

        Sertifikat::create($validated);

        return redirect()->route('sertifikat.index')->with('success', 'Sertifikat berhasil ditambahkan.');
    }

    public function adminIndex()
    {
        $sertifikats = Sertifikat::with('user')->get();
        return view('admin.sertifikat.index', compact('sertifikats'));
    }

    public function validateSertifikat(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:terima,pending,tolak',
        ]);

        $sertifikat = Sertifikat::findOrFail($id);
        $sertifikat->status = $request->status;
        $sertifikat->save();

        return redirect()->route('admin.sertifikat.index')->with('success', 'Status sertifikat berhasil diperbarui.');
    }
}