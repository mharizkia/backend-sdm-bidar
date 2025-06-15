{{-- filepath: resources/views/pegawai/sertifikat/create.blade.php --}}
@extends('layouts.pegawai')

@section('content')
<h2>Tambah Sertifikat</h2>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('sertifikat.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Lembaga</label>
        <input type="text" name="lembaga" value="{{ old('lembaga') }}" required>
    </div>
    <div>
        <label>Nomor Registrasi</label>
        <input type="text" name="nomor_registrasi" value="{{ old('nomor_registrasi') }}" required>
    </div>
    <div>
        <label>No Sertifikat</label>
        <input type="text" name="no_sertifikat" value="{{ old('no_sertifikat') }}" required>
    </div>
    <div>
        <label>Tanggal Sertifikat</label>
        <input type="date" name="tanggal_sertifikat" value="{{ old('tanggal_sertifikat') }}" required>
    </div>
    <div>
        <label>TMT Sertifikat</label>
        <input type="text" name="tmt_sertifikat" value="{{ old('tmt_sertifikat') }}" required>
    </div>
    <div>
        <label>File Sertifikat (PDF/JPG/PNG, opsional)</label>
        <input type="file" name="file_sertifikat" accept=".pdf,.jpg,.png">
    </div>
    <div>
        <button type="submit">Simpan</button>
        <a href="{{ route('sertifikat.index') }}">Kembali</a>
    </div>
</form>
@endsection