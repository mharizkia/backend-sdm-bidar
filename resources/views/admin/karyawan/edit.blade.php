@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Karyawan</h2>
@if($errors->any())
    <div class="alert alert-danger mb-3">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Karyawan</label>
            <input type="text" name="nama_karyawan" class="form-control" value="{{ old('nama_karyawan', $karyawan->nama_karyawan) }}" required>
        </div>
        <div class="mb-3">
            <label>Kode Karyawan</label>
            <input type="text" name="kode_karyawan" class="form-control" value="{{ old('kode_karyawan', $karyawan->kode_karyawan) }}">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label>NIK KTP</label>
            <input type="text" name="nik_ktp" class="form-control" value="{{ old('nik_ktp', $karyawan->nik_ktp) }}">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $karyawan->email) }}" required>
        </div>
        <div class="mb-3">
            <label>Umur</label>
            <input type="number" name="umur" class="form-control" value="{{ old('umur', $karyawan->umur) }}">
        </div>
        <div class="mb-3">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $karyawan->tempat_lahir) }}">
        </div>
        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $karyawan->tanggal_lahir) }}">
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ old('alamat', $karyawan->alamat) }}</textarea>
        </div>
        <div class="mb-3">
            <label>Agama</label>
            <input type="text" name="agama" class="form-control" value="{{ old('agama', $karyawan->agama) }}">
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="L" {{ $karyawan->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $karyawan->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $karyawan->no_hp) }}">
        </div>
        <div class="mb-3">
            <label>No NPWP</label>
            <input type="text" name="no_npwp" class="form-control" value="{{ old('no_npwp', $karyawan->no_npwp) }}">
        </div>
        <div class="mb-3">
            <label>Golongan Darah</label>
            <select name="golongan_darah" class="form-control">
                <option value="">-- Pilih Golongan Darah --</option>
                <option value="A" {{ $karyawan->golongan_darah == 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ $karyawan->golongan_darah == 'B' ? 'selected' : '' }}>B</option>
                <option value="AB" {{ $karyawan->golongan_darah == 'AB' ? 'selected' : '' }}>AB</option>
                <option value="O" {{ $karyawan->golongan_darah == 'O' ? 'selected' : '' }}>O</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Pendidikan Tertinggi</label>
            <input type="text" name="pendidikan_tertinggi" class="form-control" value="{{ old('pendidikan_tertinggi', $karyawan->pendidikan_tertinggi) }}">
        </div>
        <div class="mb-3">
            <label>Ikatan Kerja</label>
            <input type="text" name="ikatan_kerja" class="form-control" value="{{ old('ikatan_kerja', $karyawan->ikatan_kerja) }}">
        </div>
        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $karyawan->jabatan) }}">
        </div>
        <div class="mb-3">
            <label>Tanggal Mulai Kerja</label>
            <input type="date" name="tanggal_mulai_kerja" class="form-control" value="{{ old('tanggal_mulai_kerja', $karyawan->tanggal_mulai_kerja) }}">
        </div>
        <div class="mb-3">
            <label>Unit Kerja</label>
            <select name="kat_unit_kerja_id" class="form-control">
                @foreach($katunitkerja as $unit)
                    <option value="{{ $unit->id }}" {{ $karyawan->kat_unit_kerja_id == $unit->id ? 'selected' : '' }}>
                        {{ $unit->nama_unit_kerja }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Status Aktivasi</label>
            <select name="status_aktivasi" class="form-control">
                <option value="aktif" {{ $karyawan->status_aktivasi == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ $karyawan->status_aktivasi == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Foto Karyawan</label><br>
            @if($karyawan->foto_karyawan)
                <img src="{{ asset('storage/' . $karyawan->foto_karyawan) }}" alt="Foto Karyawan" width="100"><br>
            @endif
            <input type="file" name="foto_karyawan" class="form-control mt-2">
        </div>
        <div class="mb-3">
            <label>Dokumen Karyawan</label><br>
            @if($karyawan->dokumen_karyawan)
                <a href="{{ asset('storage/' . $karyawan->dokumen_karyawan) }}" target="_blank">Lihat Dokumen</a><br>
            @endif
            <input type="file" name="dokumen_karyawan" class="form-control mt-2">
        </div>
        <button type="submit" class="btn btn-primary">Update Karyawan</button>
        <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection