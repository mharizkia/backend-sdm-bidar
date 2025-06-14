@extends('layouts.app')
@section('content')
    <div>
        <label for="pelamar_id">Nama Pelamar</label>
        <p>{{ $wawancara->pelamar->nama_pelamar }}</p>
    </div>
    <form action="{{ route('wawancara.update', $wawancara->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container">
            <h1>Edit Wawancara</h1>
            <div class="mb-3">
                <label for="pewawancara_id" class="form-label">Nama PeWawancara</label>
                <select class="form-select" id="pewawancara_id" name="pewawancara_id" required>
                    @foreach ($daftarPewawancara as $pewawancara)
                        <option value="{{ $pewawancara->id }}" {{ $wawancara->pewawancara_id == $pewawancara->id ? 'selected' : '' }}>{{ $pewawancara->jabatan_pewawancara }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nama_pewawancara" class="form-label">Nama Pewawancara</label>
                <input type="text" class="form-control" id="nama_pewawancara" name="nama_pewawancara" value="{{ old('nama_pewawancara', $wawancara->nama_pewawancara) }}" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_wawancara" class="form-label">Tanggal Wawancara</label>
                <input type="date" class="form-control" id="tanggal_wawancara" name="tanggal_wawancara" value="{{ old('tanggal_wawancara', $wawancara->tanggal_wawancara) }}" required>
            </div>
            <div class="mb-3">
                <label for="kesimpulan" class="form-label">Kesimpulan</label>
                <input type="text" class="form-control" id="kesimpulan" name="kesimpulan" value="{{ $wawancara->kesimpulan }}" required>
            </div>
            <div class="mb-3">
                <label for="poin_poin_wawancara" class="form-label">File Poin Poin Wawancara (PDF)</label>
                <input type="file" class="form-control" id="poin_poin_wawancara" name="poin_poin_wawancara" accept=".pdf">
                @if ($wawancara->poin_poin_wawancara)
                    <a href="{{ Storage::url($wawancara->poin_poin_wawancara) }}" target="_blank">Lihat dokumen</a>
                @endif
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="lulus" {{ $wawancara->status == 'lulus' ? 'selected' : '' }}>Lulus</option>
                    <option value="tidak_lulus" {{ $wawancara->status == 'tidak_lulus' ? 'selected' : '' }}>Tidak Lulus</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
