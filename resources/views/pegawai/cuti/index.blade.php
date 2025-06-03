@extends('layouts.app')
@section('content')
<div class="max-w-lg mx-auto py-10">
    <h2 class="text-xl font-bold mb-4">Ajukan Cuti</h2>
    <form method="POST" action="{{ route('cuti.store') }}">
        @csrf

        <div class="mb-3">
            <label>Nomor Surat</label>
            <input type="text" name="nomor_surat" class="form-input w-full" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Surat</label>
            <input type="date" name="tanggal_surat" class="form-input w-full" required>
        </div>

        <div>
            <label>Tanggal Surat Pemohon</label>
            <input type="date" name="tanggal_surat_pemohon" class="form-input w-full" required>
        </div>

        <div class="mb-3">
            <label>Jenis Cuti</label>
            <select name="jenis_cuti" class="form-select w-full" required>
                <option value="">Pilih Jenis Cuti</option>
                <option value="Tahunan">Cuti Tahunan</option>
                <option value="Belajar">Cuti Belajar</option>
                <option value="Melahirkan">Cuti Melahirkan</option>
                <option value="Pernikahan">Cuti Pernikahan</option>
                <option value="Pelatihan">Cuti Pelatihan</option>
                @if(auth()->user()->hasRole('dosen'))
                    <option value="Mengajar">Cuti Mengajar</option>
                @endif
                <option value="Lainnya">Cuti Lainnya</option>
            </select>
        </div>

        <div class="mb-3" id="alasan_lainnya_box" style="display:none;">
            <label>Alasan Cuti Lainnya</label>
            <input type="text" name="alasan_lainnya" id="alasan_lainnya" class="form-input w-full">
        </div>

        <div class="mb-3">
            <label>Terhitung Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-input w-full" required>
        </div>
        <div class="mb-3">
            <label>Terhitung Hingga</label>
            <input type="date" name="tanggal_selesai" class="form-input w-full" required>
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Kirim</button>
    </form>
</div>

<script>
    document.getElementById('jenis_cuti').addEventListener('change', function() {
        var box = document.getElementById('alasan_lainnya_box');
        if (this.value === 'Lainnya') {
            box.style.display = 'block';
            document.getElementById('alasan_lainnya').required = true;
        } else {
            box.style.display = 'none';
            document.getElementById('alasan_lainnya').required = false;
        }
    });
</script>
@endsection