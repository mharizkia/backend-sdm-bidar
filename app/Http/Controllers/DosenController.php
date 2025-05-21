<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Golongan;
use App\Models\Fakultas;
use App\Models\JabatanAkademik;
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
        $fakultas = Fakultas::all();
        $jabatanAkademik = JabatanAkademik::all();
        $prodis = Prodi::all();
        $golongans = Golongan::all();

        return view('dosen.create', compact('fakultas', 'jabatanAkademik', 'prodis', 'golongans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_dosen' => 'required|string|max:20',
            'password' => 'required|string|min:8',
            'nik_ktp' => 'nullable|string|max:20',
            'nip' => 'nullable|string|max:20',
            'nidn' => 'nullable|string|max:20',
            'nama_dosen' => 'required|string|max:255',
            'umur' => 'nullable|integer|min:0|max:120',
            'gelar_depan' => 'nullable|string|max:10',
            'gelar_belakang' => 'nullable|string|max:10',
            'email' => 'required|email|max:255',
            'no_hp' => 'nullable|string|max:15',
            'no_npwp' => 'nullable|string|max:20',
            'tempat_lahir' => 'nullable|string|max:50',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'alamat' => 'nullable|string|max:255',
            'agama' => 'nullable|string|max:20',
            'golongan_darah' => 'nullable|in:A,B,AB,O',
            'fakultas_id' => 'nullable|exists:fakultas,id',
            'prodi_id' => 'nullable|exists:prodis,id',
            'bidang_ilmu_kompetensi' => 'nullable|string|max:255',
            'ikatan_kerja' => 'nullable|string|max:50',
            'tanggal_mulai_kerja' => 'nullable|date',
            'pendidikan_tertinggi' => 'nullable|string|max:50',
            'jabatan_akademik_id' => 'nullable|exists:jabatan_akademiks,id',
            'golongan_id' => 'nullable|exists:golongans,id',
            'foto_dosen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'dokumen_dosen' => 'nullable|file|mimes:pdf,doc,docx|max:10248',
            'status_aktivasi' => 'required|in:aktif,tidak_aktif',
        ]);

        // Upload file jika ada
        $pathFoto = $request->file('foto_dosen') ? $request->file('foto_dosen')->store('dosen/foto') : null;
        $pathDokumen = $request->file('dokumen_dosen') ? $request->file('dokumen_dosen')->store('dosen/dokumen') : null;

        $user = null;
        if ($validated['status_aktivasi'] === 'aktif') {
            $user = User::create([
                'name' => $validated['nama_dosen'],
                'email' => $validated['email'],
                'kode' => $validated['kode_dosen'],
                'password' => Hash::make($validated['password']),
            ]);
            $user->assignRole('dosen');
        }

        Dosen::create([
            'kode_dosen' => $validated['kode_dosen'],
            'password' => Hash::make($validated['password']), // Simpan apa adanya atau hash? Biasanya jangan simpan password mentah di table lain!
            'nik_ktp' => $validated['nik_ktp'] ?? null,
            'nip' => $validated['nip'] ?? null,
            'nidn' => $validated['nidn'] ?? null,
            'nama_dosen' => $validated['nama_dosen'],
            'umur' => $validated['umur'] ?? null,
            'gelar_depan' => $validated['gelar_depan'] ?? null,
            'gelar_belakang' => $validated['gelar_belakang'] ?? null,
            'email' => $validated['email'],
            'no_hp' => $validated['no_hp'] ?? null,
            'no_npwp' => $validated['no_npwp'] ?? null,
            'tempat_lahir' => $validated['tempat_lahir'] ?? null,
            'tanggal_lahir' => $validated['tanggal_lahir'] ?? null,
            'jenis_kelamin' => $validated['jenis_kelamin'] ?? null,
            'alamat' => $validated['alamat'] ?? null,
            'agama' => $validated['agama'] ?? null,
            'golongan_darah' => $validated['golongan_darah'] ?? null,
            'fakultas_id' => $validated['fakultas_id'] ?? null,
            'prodi_id' => $validated['prodi_id'] ?? null,
            'bidang_ilmu_kompetensi' => $validated['bidang_ilmu_kompetensi'] ?? null,
            'ikatan_kerja' => $validated['ikatan_kerja'] ?? null,
            'tanggal_mulai_kerja' => $validated['tanggal_mulai_kerja'] ?? null,
            'pendidikan_tertinggi' => $validated['pendidikan_tertinggi'] ?? null,
            'jabatan_akademik_id' => $validated['jabatan_akademik_id'] ?? null,
            'golongan_id' => $validated['golongan_id'] ?? null,
            'foto_dosen' => $pathFoto,
            'dokumen_dosen' => $pathDokumen,
            'status_aktivasi' => $validated['status_aktivasi'],
            'user_id' => $user?->id,
        ]);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

    public function getProdi($fakultas_id)
    {
        $prodis = Prodi::with('jenjang')
                ->where('fakultas_id', $fakultas_id)
                ->get();
        return response()->json($prodis);
    }

    public function getGolongan($jabatan_akademik_id)
    {
        $golongans = Golongan::where('jabatan_akademik_id', $jabatan_akademik_id)->get();
        return response()->json($golongans);
    }
    
    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        $fakultas = Fakultas::all();
        $jabatanAkademik = JabatanAkademik::all();
        $prodis = Prodi::all();
        $golongans = Golongan::all();
        return view('dosen.edit', compact('dosen', 'fakultas', 'jabatanAkademik', 'prodis', 'golongans')); 
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
            'gelar_depan' => 'nullable|string|max:10',
            'gelar_belakang' => 'nullable|string|max:10',
            'umur' => 'nullable|integer|min:0|max:120',
            'email' => 'required|email|max:255',
            'no_hp' => 'nullable|string|max:15',
            'no_npwp' => 'nullable|string|max:20',
            'tempat_lahir' => 'nullable|string|max:50',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'alamat' => 'nullable|string|max:255',
            'agama' => 'nullable|string|max:20',
            'golongan_darah' => 'nullable|in:A,B,AB,O',
            'fakultas_id' => 'nullable|exists:fakultas,id',
            'prodi_id' => 'nullable|exists:prodis,id',
            'bidang_ilmu_kompetensi' => 'nullable|string|max:255',
            'ikatan_kerja' => 'nullable|string|max:50',
            'tanggal_mulai_kerja' => 'nullable|date',
            'pendidikan_tertinggi' => 'nullable|string|max:50',
            'jabatan_akademik_id' => 'nullable|exists:jabatan_akademiks,id',
            'golongan_id' => 'nullable|exists:golongans,id',
            'foto_dosen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'dokumen_dosen' => 'nullable|file|mimes:pdf,doc,docx|max:10248',
            'status_aktivasi' => 'required|in:aktif,tidak_aktif',
        ]);

        $pathDokumen = $request->file('dokumen_dosen') ? $request->file('dokumen_dosen')->store('dosen/dokumen') : null;
        $pathFoto = $request->file('foto_dosen') ? $request->file('foto_dosen')->store('dosen/foto') : null;

        
        $dosen->update([
            'kode_dosen' => $request->kode_dosen,
            'nik_ktp' => $request->nik_ktp,
            'nip' => $request->nip,
            'nidn' => $request->nidn,
            'nama_dosen' => $request->nama_dosen,
            'umur' => $request->umur,
            'gelar_depan' => $request->gelar_depan,
            'gelar_belakang' => $request->gelar_belakang,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'no_npwp' => $request->no_npwp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'golongan_darah' => $request->golongan_darah,
            'fakultas_id' => $request->fakultas_id,
            'prodi_id' => $request->prodi_id,
            'bidang_ilmu_kompetensi' => $request->bidang_ilmu_kompetensi,
            'ikatan_kerja' => $request->ikatan_kerja,
            'tanggal_mulai_kerja' => $request->tanggal_mulai_kerja,
            'pendidikan_tertinggi' => $request->pendidikan_tertinggi,
            'jabatan_akademik_id' => $request->jabatan_akademik_id,
            'golongan_id' => $request->golongan_id,
            'foto_dosen' => $pathFoto,
            'dokumen_dosen' => $pathDokumen,
            'status_aktivasi' => $request->status_aktivasi,
        ]);

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
