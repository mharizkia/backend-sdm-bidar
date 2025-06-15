<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\User;
use App\Models\KatUnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Exports\KaryawanExport;
use Maatwebsite\Excel\Facades\Excel;

class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $karyawans = Karyawan::query()
            ->where('nama_karyawan', 'like', "%{$search}%")
            ->orWhere('kode_karyawan', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->get();

        $html = view('admin.karyawan.result', compact('karyawans'))->render();

        return response()->json(['html' => $html]);
    }

    public function index()
    {
        $karyawans = Karyawan::all();
        return view('admin.karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        $katunitkerja = KatUnitKerja::all();
        return view('admin.karyawan.create', compact('katunitkerja'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_karyawan' => 'required|string|max:20',
            'password' => 'required|string|min:8',
            'nik_ktp' => 'required|string|max:20',
            'nama_karyawan' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
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
            'akhir_ikatan_kerja' => 'nullable|date',
            'jabatan' => 'required|string|max:50',
            'tanggal_mulai_kerja' => 'required|date',
            'kat_unit_kerja_id' => 'required|exists:kat_unit_kerjas,id',
            'status_aktivasi' => 'required|in:aktif,tidak_aktif',
            'foto_karyawan' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
            'dokumen_karyawan' => 'nullable|file|mimes:pdf|max:10248',
        ]);

        $pathFoto = $request->file('foto_karyawan') ? $request->file('foto_karyawan')->store('foto', 'karyawan', 'public') : null;
        $pathDokumen = $request->file('dokumen_karyawan') ? $request->file('dokumen_karyawan')->store('karyawan', 'public') : null;

        $user = null;
        if ($validated['status_aktivasi'] === 'aktif') {
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
            'nik_ktp' => $validated['nik_ktp'],
            'nama_karyawan' => $validated['nama_karyawan'],
            'email' => $validated['email'],
            'umur' => $validated['umur'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'alamat' => $validated['alamat'],
            'agama' => $validated['agama'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'no_hp' => $validated['no_hp'],
            'no_npwp' => $validated['no_npwp'],
            'golongan_darah' => $validated['golongan_darah'],
            'pendidikan_tertinggi' => $validated['pendidikan_tertinggi'],
            'ikatan_kerja' => $validated['ikatan_kerja'],
            'akhir_ikatan_kerja' => $validated['akhir_ikatan_kerja'],
            'jabatan' => $validated['jabatan'],
            'tanggal_mulai_kerja' => $validated['tanggal_mulai_kerja'],
            'kat_unit_kerja_id' => $validated['kat_unit_kerja_id'],
            'status_aktivasi' => $validated['status_aktivasi'],
            'foto_karyawan' => $pathFoto,
            'dokumen_karyawan' => $pathDokumen,
            'user_id' => $user?->id,
        ]);

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $katunitkerja = KatUnitKerja::all();
        return view('admin.karyawan.edit', compact('karyawan', 'katunitkerja'));
    }

    public function update(Request $request, $id)
    {
    $karyawan = Karyawan::findOrFail($id);
    $userId = $karyawan->user_id;

    $validated = $request->validate([
        'kode_karyawan' => 'required|string|max:20',
        'password' => 'nullable|string|min:8',
        'nik_ktp' => 'required|string|max:20',
        'nama_karyawan' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:karyawans,email,' . $karyawan->id,
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
        'akhir_ikatan_kerja' => 'nullable|date',
        'jabatan' => 'required|string|max:50',
        'tanggal_mulai_kerja' => 'required|date',
        'kat_unit_kerja_id' => 'required|exists:kat_unit_kerjas,id',
        'status_aktivasi' => 'required|in:aktif,tidak_aktif',
        'foto_karyawan' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
        'dokumen_karyawan' => 'nullable|file|mimes:pdf|max:10248',
    ]);

    if ($request->hasFile('foto_karyawan')) {
        $pathFoto = $request->file('foto_karyawan')->store('fotokaryawan', 'public');
    } else {
        $pathFoto = $karyawan->foto_karyawan;
    }
    if ($request->hasFile('dokumen_karyawan')) {
        $pathDokumen = $request->file('dokumen_karyawan')->store('karyawan', 'public');
    } else {
        $pathDokumen = $karyawan->dokumen_karyawan;
    }

    $userId = $karyawan->user_id;

    if ($karyawan->status_aktivasi === 'aktif' && $validated['status_aktivasi'] === 'tidak_aktif' && $userId) {
        $user = User::find($userId);
        if ($user) {
            $user->delete();
        }
        $userId = null;
    } elseif ($validated['status_aktivasi'] === 'aktif' && $validated['kode_karyawan'] && $request->filled('password')) {
        if (!$userId) {
            $user = User::create([
                'name' => $validated['nama_karyawan'],
                'email' => $validated['email'],
                'kode' => $validated['kode_karyawan'],
                'password' => Hash::make($validated['password']),
            ]);
            $user->assignRole('karyawan');
            $userId = $user->id;
        } else {
            $user = User::find($userId);
            if ($user) {
                $user->update([
                    'name' => $validated['nama_karyawan'],
                    'email' => $validated['email'],
                    'kode' => $validated['kode_karyawan'],
                    'password' => Hash::make($validated['password']),
                ]);
            }
        }
    }

    $karyawan->update([
        'kode_karyawan' => $validated['kode_karyawan'],
        'password' => $request->filled('password') ? Hash::make($validated['password']) : $karyawan->password,
        'nik_ktp' => $validated['nik_ktp'],
        'nama_karyawan' => $validated['nama_karyawan'],
        'email' => $validated['email'],
        'umur' => $validated['umur'],
        'tempat_lahir' => $validated['tempat_lahir'],
        'tanggal_lahir' => $validated['tanggal_lahir'],
        'alamat' => $validated['alamat'],
        'agama' => $validated['agama'],
        'jenis_kelamin' => $validated['jenis_kelamin'],
        'no_hp' => $validated['no_hp'],
        'no_npwp' => $validated['no_npwp'],
        'golongan_darah' => $validated['golongan_darah'],
        'pendidikan_tertinggi' => $validated['pendidikan_tertinggi'],
        'ikatan_kerja' => $validated['ikatan_kerja'],
        'akhir_ikatan_kerja' => $validated['akhir_ikatan_kerja'],
        'jabatan' => $validated['jabatan'],
        'tanggal_mulai_kerja' => $validated['tanggal_mulai_kerja'],
        'kat_unit_kerja_id' => $validated['kat_unit_kerja_id'],
        'status_aktivasi' => $validated['status_aktivasi'],
        'foto_karyawan' => $pathFoto,
        'dokumen_karyawan' => $pathDokumen,
        'user_id' => $userId,
    ]);

    return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diupdate.');
}

    public function show($id)
    {
        $karyawan = Karyawan::with(['katUnitKerja'])->findOrFail($id);
        $katunitkerja = KatUnitKerja::all();
        return view('admin.karyawan.show', compact('karyawan', 'katunitkerja'));
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus.');
    }

    
     public function export() 
    {
        return Excel::download(new KaryawanExport, 'karyawan.xlsx');
    }


}