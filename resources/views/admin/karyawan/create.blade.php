{{-- filepath: resources/views/admin/karyawan/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-10">
    <h2 class="text-2xl font-bold mb-6">Tambah Karyawan</h2>
    <form method="POST" action="{{ route('karyawan.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Kode Karyawan</label>
            <input type="text" name="kode_karyawan" class="form-input w-full" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-input w-full" required>
        </div>
        <div class="mb-3">
            <label>NIK KTP</label>
            <input type="text" name="nik_ktp" class="form-input w-full" required>
        </div>
        <div class="mb-3">
            <label>Nama Karyawan</label>
            <input type="text" name="nama_karyawan" class="form-input w-full" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-input w-full" required>
        </div>
        <div class="mb-3">
            <label>Umur</label>
            <input type="number" name="umur" class="form-input w-full" min="18" max="100" required>
        </div>
        <div class="mb-3">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-input w-full" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-input w-full" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-input w-full" required>
        </div>
        <div class="mb-3">
            <label>Agama</label>
            <input type="text" name="agama" class="form-input w-full" required>
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select w-full" required>
                <option value="">Pilih</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-input w-full" required>
        </div>
        <div class="mb-3">
            <label>No NPWP</label>
            <input type="text" name="no_npwp" class="form-input w-full">
        </div>
        <div class="mb-3">
            <label>Golongan Darah</label>
            <select name="golongan_darah" class="form-select w-full">
                <option value="">Pilih</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
                <option value="O">O</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Pendidikan Tertinggi</label>
            <input type="text" name="pendidikan_tertinggi" class="form-input w-full" required>
        </div>
        <div class="mb-3">
            <label>Ikatan Kerja</label>
            <input type="text" name="ikatan_kerja" class="form-input w-full" required>
        </div>
        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-input w-full" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Mulai Kerja</label>
            <input type="date" name="tanggal_mulai_kerja" class="form-input w-full" required>
        </div>
        <div class="mb-3">
            <label>Unit Kerja</label>
            <select name="kat_unit_kerja_id" class="form-select w-full" required>
                <option value="">Pilih Unit Kerja</option>
                @foreach($katunitkerja as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->nama_kat_unit_kerja }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Status Aktivasi</label>
            <select name="status_aktivasi" class="form-select w-full" required>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Foto Karyawan</label>
            <input type="file" name="foto_karyawan" class="form-input w-full" accept="image/*">
        </div>
        <div class="mb-3">
            <label>Dokumen Karyawan (PDF)</label>
            <input type="file" name="dokumen_karyawan" class="form-input w-full" accept="application/pdf">
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection