@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Dosen</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dosen.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Kode Dosen --}}
        <div class="mb-3">
            <label for="kode_dosen" class="form-label">Kode Dosen</label>
            <input type="text" name="kode_dosen" id="kode_dosen" class="form-control" value="{{ old('kode_dosen') }}" required>
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" name="password" id="password" class="form-control" required>
                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">👁️</button>
            </div>
        </div>

        {{-- Nama Dosen --}}
        <div class="mb-3">
            <label for="nama_dosen" class="form-label">Nama Dosen</label>
            <input type="text" name="nama_dosen" id="nama_dosen" class="form-control" value="{{ old('nama_dosen') }}" required>
        </div>

        {{-- Gelar Depan --}}
        <div class="mb-3">
            <label for="gelar_depan" class="form-label">Gelar Depan</label>
            <input type="text" name="gelar_depan" id="gelar_depan" class="form-control" value="{{ old('gelar_depan') }}">
        </div>

        {{-- Gelar Belakang --}}
        <div class="mb-3">
            <label for="gelar_belakang" class="form-label">Gelar Belakang</label>
            <input type="text" name="gelar_belakang" id="gelar_belakang" class="form-control" value="{{ old('gelar_belakang') }}">
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        {{-- Nik KTP --}}
        <div class="mb-3">
            <label for="nik_ktp" class="form-label">Nik KTP</label>
            <input type="text" name="nik_ktp" id="nik_ktp" class="form-control" value="{{ old('nik_ktp') }}">
        </div>

        {{-- NIP --}}
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" name="nip" id="nip" class="form-control" value="{{ old('nip') }}">
        </div>

        {{-- NIDN --}}
        <div class="mb-3">
            <label for="nidn" class="form-label">NIDN</label>
            <input type="text" name="nidn" id="nidn" class="form-control" value="{{ old('nidn') }}">
        </div>

        {{-- No NPWP --}}
        <div class="mb-3">
            <label for="no_npwp" class="form-label">No NPWP</label>
            <input type="text" name="no_npwp" id="no_npwp" class="form-control" value="{{ old('no_npwp') }}">
        </div>

        {{-- No HP --}}
        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp') }}">
        </div>

        {{-- Alamat --}}
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat') }}</textarea>
        </div>

        {{-- Tempat Lahir --}}
        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}">
        </div>

        {{-- Tanggal Lahir --}}
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}">
        </div>

        {{-- Jenis Kelamin --}}
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        {{-- Agama --}}
        <div class="mb-3">
            <label for="agama" class="form-label">Agama</label>
            <select name="agama" id="agama" class="form-select" required>
                <option value="">Pilih Agama</option>
                <option value="islam" {{ old('agama') == 'islam' ? 'selected' : '' }}>Islam</option>
                <option value="kristen" {{ old('agama') == 'kristen' ? 'selected' : '' }}>Kristen</option>
                <option value="katolik" {{ old('agama') == 'katolik' ? 'selected' : '' }}>Katolik</option>
                <option value="hindu" {{ old('agama') == 'hindu' ? 'selected' : '' }}>Hindu</option>
                <option value="budha" {{ old('agama') == 'budha' ? 'selected' : '' }}>Budha</option>
                <option value="lainnya" {{ old('agama') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>

        {{-- Golongan Darah --}}
        <div class="mb-3">
            <label for="golongan_darah" class="form-label">Golongan Darah</label>
            <select name="golongan_darah" id="golongan_darah" class="form-select" required>
                <option value="">Pilih Golongan Darah</option>
                <option value="A" {{ old('golongan_darah') == 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ old('golongan_darah') == 'B' ? 'selected' : '' }}>B</option>
                <option value="AB" {{ old('golongan_darah') == 'AB' ? 'selected' : '' }}>AB</option>
                <option value="O" {{ old('golongan_darah') == 'O' ? 'selected' : '' }}>O</option>
            </select>
        </div>

        {{-- Fakultas --}}
        <div class="mb-3">
            <select id="fakultas" name="fakultas_id" class="form-control">
                <option value="">Pilih Fakultas</option>
                @foreach($fakultas as $f)
                    <option value="{{ $f->id }}">{{ $f->nama_fakultas }}</option>
                @endforeach
            </select>
        </div>

        {{-- Program Studi --}}
        <div class="mb-3">
            <label for="prodi_id" class="form-label">Program Studi</label>
                <select id="prodi" name="prodi_id" class="form-select">
                    <option value="">Pilih Prodi</option>
                </select>
        </div>

        {{-- Jabatan Akademik --}}
        <div class="mb-3">
            <select id="jabatan_akademik" name="jabatan_akademik_id" class="form-control">
                <option value="">Pilih Jabatan Akademik</option>
                @foreach($jabatanAkademik as $j)
                    <option value="{{ $j->id }}">{{ $j->nama_jabatan_akademik }}</option>
                @endforeach
            </select>
        </div>

        {{-- Golongan --}}
        <div class="mb-3">
            <label for="golongan_id" class="form-label">Golongan</label>
                <select id="golongan" name="golongan_id" class="form-select">
                    <option value="">Pilih Golongan</option>
                </select>
        </div>

        {{-- Bidang Ilmu Kompetensi --}}
        <div class="mb-3">
            <label for="bidang_ilmu_kompetensi" class="form-label">Bidang Ilmu Kompetensi</label>
            <input type="text" name="bidang_ilmu_kompetensi" id="bidang_ilmu_kompetensi" class="form-control" value="{{ old('bidang_ilmu_kompetensi') }}">
        </div>

        {{-- Ikatan Kerja --}}
        <div class="mb-3">
            <label for="ikatan_kerja" class="form-label">Ikatan Kerja</label>
            <select name="ikatan_kerja" id="ikatan_kerja" class="form-select" required>
                <option value="">Pilih Ikatan Kerja</option>
                <option value="luar_biasa" {{ old('ikatan_kerja') == 'luar_biasa' ? 'selected' : '' }}>Luar Biasa</option>
                <option value="balon_dosen" {{ old('ikatan_kerja') == 'balon_dosen' ? 'selected' : '' }}>Balon Dosen</option>
                <option value="calon_dosen" {{ old('ikatan_kerja') == 'calon_dosen' ? 'selected' : '' }}>Calon Dosen</option>
                <option value="dosen_tetap" {{ old('ikatan_kerja') == 'dosen_tetap' ? 'selected' : '' }}>Dosen Tetap</option>
                <option value="dosen_pns" {{ old('ikatan_kerja') == 'dosen_pns' ? 'selected' : '' }}>Dosen PNS</option>
            </select>
        </div>

        {{-- Tanggal Mulai Kerja --}}
        <div class="mb-3">
            <label for="tanggal_mulai_kerja" class="form-label">Tanggal Mulai Kerja</label>
            <input type="date" name="tanggal_mulai_kerja" id="tanggal_mulai_kerja" class="form-control" value="{{ old('tanggal_mulai_kerja') }}">
        </div>

        {{-- Pendidikan Tertinggi --}}
        <div class="mb-3">
            <label for="pendidikan_tertinggi" class="form-label">Pendidikan Tertinggi</label>
            <select name="pendidikan_tertinggi" id="pendidikan_tertinggi" class="form-select" required>
                <option value="">Pilih Pendidikan Tertinggi</option>
                <option value="SMA" {{ old('pendidikan_tertinggi') == 'SMA' ? 'selected' : '' }}>SMA</option>
                <option value="DIPLOMA-1" {{ old('pendidikan_tertinggi') == 'DIPLOMA-3' ? 'selected' : '' }}>D1</option>
                <option value="STRATA-1" {{ old('pendidikan_tertinggi') == 'STRATA-1' ? 'selected' : '' }}>S1</option>
                <option value="STRATA-2" {{ old('pendidikan_tertinggi') == 'STRATA-2' ? 'selected' : '' }}>S2</option>
                <option value="STRATA-3" {{ old('pendidikan_tertinggi') == 'STRATA-3' ? 'selected' : '' }}>S3</option>
            </select>

        {{-- Upload foto dosen --}}
        <div class="mb-3">
            <label for="foto_dosen" class="form-label">Foto Dosen (jpeg,png,jpg max 2MB)</label>
            <input type="file" name="foto_dosen" id="foto_dosen" class="form-control" accept="image/jpeg,image/png,image/jpg">
        </div>

        {{-- Upload dokumen dosen --}}
        <div class="mb-3">
            <label for="dokumen_dosen" class="form-label">Dokumen Dosen (pdf,doc,docx max 10MB)</label>
            <input type="file" name="dokumen_dosen" id="dokumen_dosen" class="form-control" accept=".pdf,.doc,.docx">
        </div>

        {{-- Status Aktivasi --}}
        <div class="mb-3">
            <label for="status_aktivasi" class="form-label">Status Aktivasi</label>
            <select name="status_aktivasi" id="status_aktivasi" class="form-select" required>
                <option value="aktif" {{ old('status_aktivasi') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="tidak_aktif" {{ old('status_aktivasi') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    function togglePassword() {
        const input = document.getElementById("password");
        input.type = input.type === "password" ? "text" : "password";
    }
</script>

<script>
    $('#fakultas').on('change', function () {
        var fakultasId = $(this).val();
        $('#prodi').html('<option value="">Loading...</option>');
        if (fakultasId) {
            $.get('/get-prodi/' + fakultasId, function (data) {
                $('#prodi').empty().append('<option value="">Pilih Prodi</option>');
                $.each(data, function (key, value) {
                    $('#prodi').append('<option value="'+ value.id +'">'+ value.jenjang.kode_jenjang + ' ' + value.nama_prodi +'</option>');
                });
            });
        } else {
            $('#prodi').html('<option value="">Pilih Prodi</option>');
        }
    });
</script>

<script>
    $('#jabatan_akademik').on('change', function () {
        var jabatan_akademikID = $(this).val();
        $('#golongan').html('<option value="">Loading...</option>');
        if (jabatan_akademikID) {
            $.get('/get-golongan/' + jabatan_akademikID, function (data) {
                $('#golongan').empty();
                $('#golongan').append('<option value="">Pilih Golongan</option>');
                $.each(data, function (key, value) {
                    $('#golongan').append('<option value="' + key + '">' + value.nama_golongan + '</option>');
                });
            });
        } else {
            $('#golongan').html('<option value="">Pilih Golongan</option>');
        }
    });
</script>

@endsection
