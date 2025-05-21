{{-- resources/views/dosen/create.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Dosen</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tampilkan error validation --}}
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

        <div class="mb-3">
            <label for="kode_dosen" class="form-label">Kode Dosen</label>
            <input type="text" name="kode_dosen" id="kode_dosen" class="form-control" value="{{ old('kode_dosen') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" name="password" id="password" class="form-control" required>
                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">👁️</button>
            </div>
        </div>

        <div class="mb-3">
            <label for="nama_dosen" class="form-label">Nama Dosen</label>
            <input type="text" name="nama_dosen" id="nama_dosen" class="form-control" value="{{ old('nama_dosen') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <select id="fakultas" name="fakultas_id" class="form-control">
                <option value="">Pilih Fakultas</option>
                @foreach($fakultas as $f)
                    <option value="{{ $f->id }}">{{ $f->nama_fakultas }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="prodi_id" class="form-label">Program Studi</label>
                <select id="prodi" name="prodi_id" class="form-select">
                    <option value="">Pilih Prodi</option>
                </select>
        </div>

        <div class="mb-3">
            <select id="jabatan_akademik" name="jabatan_akademik_id" class="form-control">
                <option value="">Pilih Jabatan Akademik</option>
                @foreach($jabatanAkademik as $j)
                    <option value="{{ $j->id }}">{{ $j->nama_jabatan_akademik }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="golongan_id" class="form-label">Golongan</label>
                <select id="golongan" name="golongan_id" class="form-select">
                    <option value="">Pilih Golongan</option>
                </select>
        </div>

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
