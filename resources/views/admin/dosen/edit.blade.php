@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Dosen</h2>
@if($errors->any())
    <div class="alert alert-danger mb-3">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nama Dosen --}}
        <div class="mb-3">
            <label>Nama Dosen</label>
            <input type="text" name="nama_dosen" class="form-control" value="{{ old('nama_dosen', $dosen->nama_dosen) }}" required>
        </div>

        {{-- Kode Dosen --}}
        <div class="mb-3">
            <label>Kode Dosen</label>
            <input type="text" name="kode_dosen" class="form-control" value="{{ old('kode_dosen', $dosen->kode_dosen) }}">
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" name="password" id="password" class="form-control">
                <button type="button" class="btn btn-outline-secondary"  onclick="togglePassword()">👁️</button>
            </div>
        </div>

        {{-- Nik Ktp --}}
        <div class="mb-3">
            <label>NIK/KTP</label>
            <input type="text" name="nik_ktp" class="form-control" value="{{ old('nik_ktp', $dosen->nik_ktp) }}">
        </div>

        {{-- NIP --}}
        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" value="{{ old('nip', $dosen->nip) }}">
        </div>

        {{-- NIDN --}} 
        <div class="mb-3">
            <label>NIDN</label>
            <input type="text" name="nidn" class="form-control" value="{{ old('nidn', $dosen->nidn) }}">
        </div>

        {{-- Gelar Depan --}}
        <div class="mb-3">
            <label>Gelar Depan</label>
            <input type="text" name="gelar_depan" class="form-control" value="{{ old('gelar_depan', $dosen->gelar_depan) }}">
        </div>

        {{-- Gelar Belakang --}}
        <div class="mb-3">
            <label>Gelar Belakang</label>
            <input type="text" name="gelar_belakang" class="form-control" value="{{ old('gelar_belakang', $dosen->gelar_belakang) }}">
        </div>

        {{-- NO NPWP --}}
        <div class="mb-3">
            <label>No NPWP</label>
            <input type="text" name="no_npwp" class="form-control" value="{{ old('no_npwp', $dosen->no_npwp) }}">
        </div>

        {{-- Tempat Lahir --}}
        <div class="mb-3">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $dosen->tempat_lahir) }}">
        </div>

        {{-- Tanggal Lahir --}}
        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $dosen->tanggal_lahir) }}">
        </div>

        {{-- Jenis Kelamin --}}
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="L" {{ $dosen->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $dosen->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        {{-- Umur --}}
        <div class="mb-3">
            <label>Umur</label>
            <input type="number" name="umur" class="form-control" value="{{ old('umur', $dosen->umur) }}">
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $dosen->email) }}" required>
        </div>

        {{-- No HP --}}
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $dosen->no_hp) }}">
        </div>

        {{-- Alamat --}}
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ old('alamat', $dosen->alamat) }}</textarea>
        </div>

        {{-- Agama --}}
        <div class="mb-3">
            <label>Agama</label>
            <select name="agama" class="form-control">
                <option value="">-- Pilih Agama --</option>
                <option value="Islam">Islam</option>
                <option value="Kristen" >Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
        </div>

        {{-- Golongan Darah --}}
        <div class="mb-3">
            <label>Golongan Darah</label>
            <select name="golongan_darah" class="form-control">
                <option value="">-- Pilih Golongan Darah --</option>
                <option value="A" {{ $dosen->golongan_darah == 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ $dosen->golongan_darah == 'B' ? 'selected' : '' }}>B</option>
                <option value="AB" {{ $dosen->golongan_darah == 'AB' ? 'selected' : '' }}>AB</option> 
                <option value="O" {{ $dosen->golongan_darah == 'O' ? 'selected' : '' }}>O</option>
            </select>
        </div>

        {{-- Fakultas --}}
        <div class="mb-3">
            <label for="fakultas" class="form-label">Fakultas</label>
            <select id="fakultas" name="fakultas_id" class="form-select">
                <option value="">Pilih Fakultas</option>
                @foreach ($fakultas as $f)
                    <option value="{{ $f->id }}" {{ $dosen->fakultas_id == $f->id ? 'selected' : '' }}>
                        {{ $f->nama_fakultas }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Program Studi --}}
        <div class="mb-3">
            <label for="prodi" class="form-label">Program Studi</label>
            <select id="prodi" name="prodi_id" class="form-select">
                <option value="">Pilih Program Studi</option>
                @foreach ($prodis as $p)
                    <option value="{{ $p->id }}" {{ $dosen->prodi_id == $p->id ? 'selected' : '' }}>
                        {{ $p->jenjang->kode_jenjang }} {{ $p->nama_prodi }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Jabatan Akademik --}}
        <div class="mb-3">
            <label for="jabatan_akademik" class="form-label">Jabatan Akademik</label>
            <select id="jabatan_akademik" name="jabatan_akademik_id" class="form-select">
                <option value="">Pilih Jabatan Akademik</option>
                @foreach ($jabatanAkademik as $ja)
                    <option value="{{ $ja->id }}" {{ $dosen->jabatan_akademik_id == $ja->id ? 'selected' : '' }}>
                        {{ $ja->nama_jabatan_akademik }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Golongan --}}
        <div class="mb-3">
            <label for="golongan" class="form-label">Golongan</label>
            <select id="golongan" name="golongan_id" class="form-select">
                <option value="">Pilih Golongan</option>
                @foreach ($golongans as $g)
                    <option value="{{ $g->id }}" {{ $dosen->golongan_id == $g->id ? 'selected' : '' }}>
                        {{ $g->nama_golongan }}
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

<script>
    function togglePassword() {
        const input = document.getElementById("password");
        input.type = input.type === "password" ? "text" : "password";
    }
</script>

<script>
    function loadProdi(fakultasId, selectedProdiId = null) {
        $('#prodi').html('<option value="">Loading...</option>');
        $.get('/get-prodi/' + fakultasId, function (data) {
            $('#prodi').empty().append('<option value="">Pilih Prodi</option>');
            $.each(data, function (key, value) {
                let selected = (selectedProdiId == value.id) ? 'selected' : '';
                $('#prodi').append('<option value="' + value.id + '" ' + selected + '>' + value.jenjang.kode_jenjang + ' ' + value.nama_prodi + '</option>');
            });
        });
    }

    function loadGolongan(jabatanId, selectedGolonganId = null) {
        $('#golongan').html('<option value="">Loading...</option>');
        $.get('/get-golongan/' + jabatanId, function (data) {
            $('#golongan').empty().append('<option value="">Pilih Golongan</option>');
            $.each(data, function (key, value) {
                let selected = (selectedGolonganId == value.id) ? 'selected' : '';
                $('#golongan').append('<option value="' + value.id + '" ' + selected + '>' + value.nama_golongan + '</option>');
            });
        });
    }

    $(document).ready(function () {
        const fakultasId = $('#fakultas').val();
        const selectedProdiId = "{{ old('prodi_id', $dosen->prodi_id) }}";

        if (fakultasId) {
            loadProdi(fakultasId, selectedProdiId);
        }

        $('#fakultas').on('change', function () {
            const selected = $(this).val();
            loadProdi(selected);
        });

        const jabatanId = $('#jabatan_akademik').val();
        const selectedGolonganId = "{{ old('golongan_id', $dosen->golongan_id) }}";

        if (jabatanId) {
            loadGolongan(jabatanId, selectedGolonganId);
        }

        $('#jabatan_akademik').on('change', function () {
            const selected = $(this).val();
            loadGolongan(selected);
        });
    });
</script>


@endsection
