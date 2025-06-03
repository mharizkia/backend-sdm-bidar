<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class AdminPegawaiController extends Controller
{
        public function index()
    {
        // Tampilkan semua dosen dan karyawan saat halaman dibuka
        $dosens = Dosen::latest()->get();
        $karyawans = Karyawan::latest()->get();

        return view('admin.ui.dashboard', compact('dosens', 'karyawans'));
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

        // Render ulang isi tabel (tanpa reload)
        $html = view('admin.ui.result', compact('dosens', 'karyawans'))->render();

        return response()->json(['html' => $html]);
    }
}
