@extends('layouts.app')
@section('content')
    <div>
        <label for="pelamar_id">Nama Pelamar</label>
        <p>{{ $psikologi->pelamar->nama_pelamar }}</p>
    </div>
    <form action="{{ route('psikologi.update', $psikologi->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container">
            <h1>Edit psikologi</h1>
            <div class="mb-3">
                <label for="tanggal_psikologis" class="form-label">Tanggal psikologi</label>
                <input type="date" class="form-control" id="tanggal_psikologis" name="tanggal_psikologis" value="{{ old('tanggal_psikologis', $psikologi->tanggal_psikologis) }}" required>
            </div>
            <div class="mb-3">
                <label for="kesimpulan" class="form-label">Kesimpulan</label>
                <input type="text" class="form-control" id="kesimpulan" name="kesimpulan" value="{{ $psikologi->kesimpulan }}" required>
            </div>
            <div class="mb-3">
                <label for="hasil_psikologis" class="form-label">File Poin Poin psikologi (PDF)</label>
                <input type="file" class="form-control" id="hasil_psikologis" name="hasil_psikologis" accept=".pdf">
                @if ($psikologi->hasil_psikologis)
                    <a href="{{ Storage::url($psikologi->hasil_psikologis) }}" target="_blank">Lihat dokumen</a>
                @endif
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="lulus" {{ $psikologi->status == 'lulus' ? 'selected' : '' }}>Lulus</option>
                    <option value="tidak_lulus" {{ $psikologi->status == 'tidak_lulus' ? 'selected' : '' }}>Tidak Lulus</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
