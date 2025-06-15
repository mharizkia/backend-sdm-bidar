<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
        $karyawans = Karyawan::all();

        $dataRingkasan = [
            'dosen' => [
                'jumlah' => $dosens->count(),
            ],
            'karyawan' => [
                'jumlah' => $karyawans->count(),
            ],
        ];

        $totalPegawaiKeseluruhan = $dataRingkasan['dosen']['jumlah'] + $dataRingkasan['karyawan']['jumlah'];

        $notifications = auth()->user()->notifications->sortByDesc('created_at')->take(10);
        return view('admin.dashboard', compact('notifications', 'dataRingkasan',
            'dosens', 'karyawans', 'totalPegawaiKeseluruhan'));
        
    }

    public function pegawaiIndex()
    {
        $dosens = Dosen::all();
        $karyawans = Karyawan::all();

        $dataRingkasan = [
            'dosen' => [
                'laki_laki' => $dosens->where('jenis_kelamin', 'L')->count(),
                'perempuan' => $dosens->where('jenis_kelamin', 'P')->count(),
                'jumlah' => $dosens->count(),
            ],
            'karyawan' => [
                'laki_laki' => $karyawans->where('jenis_kelamin', 'L')->count(),
                'perempuan' => $karyawans->where('jenis_kelamin', 'P')->count(),
                'jumlah' => $karyawans->count(),
            ],
        ];

        $totalLakiLaki = $dataRingkasan['dosen']['laki_laki'] + $dataRingkasan['karyawan']['laki_laki'];
        $totalPerempuan = $dataRingkasan['dosen']['perempuan'] + $dataRingkasan['karyawan']['perempuan'];
        $totalPegawaiKeseluruhan = $dataRingkasan['dosen']['jumlah'] + $dataRingkasan['karyawan']['jumlah'];

        return view('admin.ringkasan', compact(
            'dataRingkasan',
            'totalLakiLaki',
            'totalPerempuan',
            'totalPegawaiKeseluruhan'
        ));
    }

    public function teleponIndex()
    {
        $dosens = Dosen::all();
        $karyawans = Karyawan::all();

        return view('admin.telepon', compact('dosens', 'karyawans'));
    }

    public function mutasi()
    {
        $karyawans = Karyawan::with('katUnitKerja')->get();

        return view('admin.mutasi', compact('karyawans'));
    }

    public function mutasiStore(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'kat_unit_kerja_id' => 'required|exists:kat_unit_kerjas,id',
        ]);

        $karyawan = Karyawan::findOrFail($validated['karyawan_id']);
        $karyawan->kat_unit_kerja_id = $validated['kat_unit_kerja_id'];
        $karyawan->save();

        return redirect()->route('admin.mutasi')->with('success', 'Mutasi karyawan berhasil dilakukan.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $dosens = Dosen::query()
            ->where('nama_dosen', 'like', "%{$search}%")
            ->orWhere('kode_dosen', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->get();

        $karyawans = Karyawan::query()
            ->where('nama_karyawan', 'like', "%{$search}%")
            ->orWhere('kode_karyawan', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->get();

        $html = view('admin.ui.result', compact('dosens', 'karyawans'))->render();

        return response()->json(['html' => $html]);
    }
}
