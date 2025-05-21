@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Dosen</h2>

    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nama Dosen --}}
        <div class="mb-3">
            <label>Nama Dosen</label>
            <input type="text" name="nama_dosen" class="form-control" value="{{ old('nama_dosen', $dosen->nama_dosen) }}" required>
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $dosen->email) }}" required>
        </div>

        {{-- Kode Dosen --}}
        <div class="mb-3">
            <label>Kode Dosen</label>
            <input type="text" name="kode_dosen" class="form-control" value="{{ old('kode_dosen', $dosen->kode_dosen) }}">
        </div>

        {{-- Umur --}}
        <div class="mb-3">
            <label>Umur</label>
            <input type="number" name="umur" class="form-control" value="{{ old('umur', $dosen->umur) }}">
        </div>

        {{-- No HP --}}
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $dosen->no_hp) }}">
        </div>

        {{-- Fakultas --}}
        <div class="mb-3">
            <label>Fakultas</label>
            <select name="fakultas_id" class="form-control">
                <option value="">-- Pilih Fakultas --</option>
                @foreach ($fakultas as $f)
                    <option value="{{ $f->id }}" {{ $dosen->fakultas_id == $f->id ? 'selected' : '' }}>
                        {{ $f->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Prodi --}}
        <div class="mb-3">
            <label>Prodi</label>
            <select name="prodi_id" class="form-control">
                <option value="">-- Pilih Prodi --</option>
                @foreach ($prodis as $prodi)
                    <option value="{{ $prodi->id }}" {{ $dosen->prodi_id == $prodi->id ? 'selected' : '' }}>
                        {{ $prodi->jenjang->nama ?? '' }} {{ $prodi->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Jabatan Akademik --}}
        <div class="mb-3">
            <label>Jabatan Akademik</label>
            <select name="jabatan_akademik_id" class="form-control">
                <option value="">-- Pilih Jabatan --</option>
                @foreach ($jabatanAkademik as $ja)
                    <option value="{{ $ja->id }}" {{ $dosen->jabatan_akademik_id == $ja->id ? 'selected' : '' }}>
                        {{ $ja->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Golongan --}}
        <div class="mb-3">
            <label>Golongan</label>
            <select name="golongan_id" class="form-control">
                <option value="">-- Pilih Golongan --</option>
                @foreach ($golongans as $g)
                    <option value="{{ $g->id }}" {{ $dosen->golongan_id == $g->id ? 'selected' : '' }}>
                        {{ $g->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Foto Dosen --}}
        <div class="mb-3">
            <label>Foto Dosen</label><br>
            @if($dosen->foto_dosen)
                <img src="{{ asset('storage/' . $dosen->foto_dosen) }}" alt="Foto Dosen" width="100"><br>
            @endif
            <input type="file" name="foto_dosen" class="form-control mt-2">
        </div>

        {{-- Dokumen Dosen --}}
        <div class="mb-3">
            <label>Dokumen Dosen</label><br>
            @if($dosen->dokumen_dosen)
                <a href="{{ asset('storage/' . $dosen->dokumen_dosen) }}" target="_blank">Lihat Dokumen</a><br>
            @endif
            <input type="file" name="dokumen_dosen" class="form-control mt-2">
        </div>

        {{-- Status Aktivasi --}}
        <div class="mb-3">
            <label>Status Aktivasi</label>
            <select name="status_aktivasi" class="form-control">
                <option value="aktif" {{ $dosen->status_aktivasi == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="tidak_aktif" {{ $dosen->status_aktivasi == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Dosen</button>
        <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
