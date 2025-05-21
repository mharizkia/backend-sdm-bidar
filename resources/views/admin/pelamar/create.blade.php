@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto mt-8 p-6 bg-white shadow rounded">
    <h2 class="text-xl font-bold mb-4">Form Pelamar</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('pelamar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block font-medium">Nama Pelamar</label>
            <input type="text" name="nama_pelamar" class="w-full border rounded p-2">
            @error('nama_pelamar') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">NIDN</label>
            <input type="text" name="nidn" class="w-full border rounded p-2">
            @error('nidn') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="w-full border rounded p-2">
            @error('tempat_lahir') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="w-full border rounded p-2">
            @error('tanggal_lahir') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="w-full border rounded p-2">
                <option value="">-- Pilih --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
            @error('jenis_kelamin') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Email</label>
            <input type="email" name="email" class="w-full border rounded p-2">
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">No HP</label>
            <input type="text" name="no_hp" class="w-full border rounded p-2">
            @error('no_hp') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Alamat</label>
            <input type="text" name="alamat" class="w-full border rounded p-2">
            @error('alamat') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Pendidikan Tertinggi</label>
            <select name="pendidikan_tertinggi" class="w-full border rounded p-2">
                <option value="">-- Pilih --</option>
                <option value="SMA">SMA</option>
                <option value="DIPLOMA-3">D3</option>
                <option value="STRATA-1">S1</option>
                <option value="STRATA-2">S2</option>
                <option value="STRATA-3">S3</option>
            </select>
            @error('pendidikan_tertinggi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Umur</label>
            <input type="text" name="umur" class="w-full border rounded p-2">
            @error('umur') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">IPK</label>
            <input type="text" name="ipk" class="w-full border rounded p-2">
            @error('ipk') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Bidang Ilmu Kompetensi</label>
            <input type="text" name="bidang_ilmu_kompetensi" class="w-full border rounded p-2">
            @error('bidang_ilmu_kompetensi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Pilihan Lamaran</label>
            <select name="pilihan_lamaran" class="w-full border rounded p-2">
                <option value="">-- Pilih --</option>
                <option value="dosen">Dosen</option>
                <option value="karyawan">Karyawan</option>
            </select>
            @error('pilihan_lamaran') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Tanggal Lamaran</label>
            <input type="date" name="tanggal_lamaran" class="w-full border rounded p-2">
            @error('tanggal_lamaran') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Dokumen Lamaran (PDF)</label>
            <input type="file" name="dokumen_lamaran" accept="application/pdf">
            @error('dokumen_lamaran') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Simpan Pelamar
        </button>
    </form>
</div>
@endsection