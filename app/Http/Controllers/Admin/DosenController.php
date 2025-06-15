<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Golongan;
use App\Models\Fakultas;
use App\Models\JabatanAkademik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class DosenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        $dosens = Dosen::all();
        $notifications = auth()->user()->notifications;
        return view('admin.dosen.index', compact('dosens', 'notifications')); 
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $dosens = Dosen::query()
            ->where('nama_dosen', 'like', "%{$search}%")
            ->orWhere('kode_dosen', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->orWhere('nidn', 'like', "%{$search}%")
            ->orWhere('nip', 'like', "%{$search}%")
            ->get();

        $html = view('admin.dosen.result', compact('dosens'))->render();

        return response()->json(['html' => $html]);
    }    

    public function create()
    {
        $fakultas = Fakultas::all();
        $jabatanAkademik = JabatanAkademik::all();
        $prodis = Prodi::all();
        $golongans = Golongan::all();

        return view('admin.dosen.create', compact('fakultas', 'jabatanAkademik', 'prodis', 'golongans'));
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
            'akhir_ikatan_kerja' => 'nullable|date',
            'tanggal_mulai_kerja' => 'nullable|date',
            'pendidikan_tertinggi' => 'nullable|string|max:50',
            'jabatan_akademik_id' => 'nullable|exists:jabatan_akademiks,id',
            'golongan_id' => 'nullable|exists:golongans,id',
            'foto_dosen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'dokumen_dosen' => 'nullable|file|mimes:pdf,doc,docx|max:10248',
            'status_aktivasi' => 'required|in:aktif,tidak_aktif',
        ]);

        $pathFoto = $request->file('foto_dosen') ? $request->file('foto_dosen')->store('dosen/foto', 'public') : null;
        $pathDokumen = $request->file('dokumen_dosen') ? $request->file('dokumen_dosen')->store('dosen/dokumen', 'public') : null;

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
            'password' => Hash::make($validated['password']),
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
            'akhir_ikatan_kerja' => $validated['akhir_ikatan_kerja'] ?? null,
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
        return view('admin.dosen.edit', compact('dosen', 'fakultas', 'jabatanAkademik', 'prodis', 'golongans')); 
    }

    public function show($id)
    {
        $dosen = Dosen::with(['fakultas', 'prodi', 'jabatanAkademik', 'golongan'])
            ->findOrFail($id);
        $fakultas = Fakultas::all();
        $jabatanAkademik = JabatanAkademik::all();
        $prodis = Prodi::all();
        $golongans = Golongan::all();
        return view('admin.dosen.show', compact('dosen', 'fakultas', 'jabatanAkademik', 'prodis', 'golongans'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $validated = $request->validate([
            'kode_dosen' => 'required|string|max:20',
            'password' => 'nullable|string|min:8',
            'nik_ktp' => 'nullable|string|max:20',
            'nip' => 'nullable|string|max:20',
            'nidn' => 'nullable|string|max:20',
            'nuptk' => 'nullable|string|max:20',
            'nama_dosen' => 'required|string|max:255',
            'umur' => 'nullable|integer|min:0|max:120',
            'gelar_depan' => 'nullable|string|max:10',
            'gelar_belakang' => 'nullable|string|max:10',
            'email' => 'required|email|max:255|unique:dosens,email,' . $dosen->id,
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
            'akhir_ikatan_kerja' => 'nullable|date',
            'tanggal_mulai_kerja' => 'nullable|date',
            'pendidikan_tertinggi' => 'nullable|string|max:50',
            'jabatan_akademik_id' => 'nullable|exists:jabatan_akademiks,id',
            'golongan_id' => 'nullable|exists:golongans,id',
            'foto_dosen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'dokumen_dosen' => 'nullable|file|mimes:pdf,doc,docx|max:10248',
            'status_aktivasi' => 'required|in:aktif,tidak_aktif',
        ]);

        if ($request->hasFile('foto_dosen')) {
            $pathFoto = $request->file('foto_dosen')->store('dosen/foto', 'public');
        } else {
            $pathFoto = $dosen->foto_dosen;
        }
        if ($request->hasFile('dokumen_dosen')) {
            $pathDokumen = $request->file('dokumen_dosen')->store('dosen/dokumen', 'public');
        } else {
            $pathDokumen = $dosen->dokumen_dosen;
        }

        $userId = $dosen->user_id;

        if ($dosen->status_aktivasi === 'aktif' && $validated['status_aktivasi'] === 'tidak_aktif' && $userId) {
            $user = User::find($userId);
            if ($user) {
                $user->delete();
            }
            $userId = null;
        } elseif ($validated['status_aktivasi'] === 'aktif' && $validated['kode_dosen']) {
            if (!$userId) {
                $user = User::create([
                    'name' => $validated['nama_dosen'],
                    'email' => $validated['email'],
                    'kode' => $validated['kode_dosen'],
                    'password' => Hash::make($validated['password']),
                    'profile_photo' => $pathFoto,
                ]);
                $user->assignRole('dosen');
                $userId = $user->id;
            } else {
                $user = User::find($userId);
                if ($user) {
                    $user->update([
                        'name' => $validated['nama_dosen'],
                        'email' => $validated['email'],
                        'kode' => $validated['kode_dosen'],
                        'password' => Hash::make($validated['password']),
                        'foto' => $pathFoto,
                    ]);
                }
            }
        } elseif ($userId) {
            $user = User::find($userId);
            if ($user) {
                $user->update([
                    'name' => $validated['nama_dosen'],
                    'email' => $validated['email'],
                    'kode' => $validated['kode_dosen'],
                    'profile_photo' => $pathFoto,
                ]);
            }
        }
        

        $dosen->update([
            'kode_dosen' => $validated['kode_dosen'],
            'password' => $request->filled('password') ? Hash::make($validated['password']) : $dosen->password,
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
            'akhir_ikatan_kerja' => $validated['akhir_ikatan_kerja'] ?? null,
            'tanggal_mulai_kerja' => $validated['tanggal_mulai_kerja'] ?? null,
            'pendidikan_tertinggi' => $validated['pendidikan_tertinggi'] ?? null,
            'jabatan_akademik_id' => $validated['jabatan_akademik_id'] ?? null,
            'golongan_id' => $validated['golongan_id'] ?? null,
            'foto_dosen' => $pathFoto,
            'dokumen_dosen' => $pathDokumen,
            'status_aktivasi' => $validated['status_aktivasi'],
            'user_id' => $userId,
        ]);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil diupdate.');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus.');
    }
}
