{{-- filepath: resources/views/admin/pelamar/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-10">
    <h2 class="text-2xl font-bold mb-6">Edit Data Pelamar</h2>
    <form method="POST" action="{{ route('pelamar.update', $pelamar->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Pelamar</label>
            <input type="text" name="nama_pelamar" class="form-input w-full" value="{{ old('nama_pelamar', $pelamar->nama_pelamar) }}" required>
        </div>
        <div class="mb-3">
            <label>NIDN</label>
            <input type="text" name="nidn" class="form-input w-full" value="{{ old('nidn', $pelamar->nidn) }}">
        </div>
        <div class="mb-3">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-input w-full" value="{{ old('tempat_lahir', $pelamar->tempat_lahir) }}" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-input w-full" value="{{ old('tanggal_lahir', $pelamar->tanggal_lahir) }}" required>
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select w-full" required>
                <option value="L" {{ old('jenis_kelamin', $pelamar->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin', $pelamar->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-input w-full" value="{{ old('email', $pelamar->email) }}" required>
        </div>
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-input w-full" value="{{ old('no_hp', $pelamar->no_hp) }}" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-input w-full" value="{{ old('alamat', $pelamar->alamat) }}" required>
        </div>
        <div class="mb-3">
            <label>Pendidikan Tertinggi</label>
            <input type="text" name="pendidikan_tertinggi" class="form-input w-full" value="{{ old('pendidikan_tertinggi', $pelamar->pendidikan_tertinggi) }}" required>
        </div>
        <div class="mb-3">
            <label>Umur</label>
            <input type="number" name="umur" class="form-input w-full" value="{{ old('umur', $pelamar->umur) }}" required>
        </div>
        <div class="mb-3">
            <label>IPK</label>
            <input type="number" step="0.01" name="ipk" class="form-input w-full" value="{{ old('ipk', $pelamar->ipk) }}" required>
        </div>
        <div class="mb-3">
            <label>Bidang Ilmu Kompetensi</label>
            <input type="text" name="bidang_ilmu_kompetensi" class="form-input w-full" value="{{ old('bidang_ilmu_kompetensi', $pelamar->bidang_ilmu_kompetensi) }}" required>
        </div>
        <div class="mb-3">
            <label>Pilihan Lamaran</label>
            <select name="pilihan_lamaran" class="form-select w-full" required>
                <option value="dosen" {{ old('pilihan_lamaran', $pelamar->pilihan_lamaran) == 'dosen' ? 'selected' : '' }}>Dosen</option>
                <option value="karyawan" {{ old('pilihan_lamaran', $pelamar->pilihan_lamaran) == 'karyawan' ? 'selected' : '' }}>Karyawan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal Lamaran</label>
            <input type="date" name="tanggal_lamaran" class="form-input w-full" value="{{ old('tanggal_lamaran', $pelamar->tanggal_lamaran) }}" required>
        </div>
        <div class="mb-3">
            <label>Dokumen Lamaran (PDF, kosongkan jika tidak ingin ganti)</label>
            <input type="file" name="dokumen_lamaran" class="form-input w-full" accept="application/pdf">
            @if($pelamar->dokumen_lamaran)
                <a href="{{ asset('storage/'.$pelamar->dokumen_lamaran) }}" target="_blank" class="text-blue-600 underline">Lihat Dokumen Saat Ini</a>
            @endif
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
        <a href="{{ route('pelamar.index') }}" class="ml-2 text-gray-600 underline">Batal</a>
    </form>
</div>
@endsection