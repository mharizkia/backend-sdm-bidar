@extends('layouts.app')
@section('content')
<div class="max-w-lg mx-auto py-10">
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-700">Ajukan Cuti</h2>
    <form method="POST" action="{{ route('cuti.store') }}" class="bg-white shadow-lg rounded-lg p-8 space-y-5">
        @csrf

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Nomor Surat</label>
            <input type="text" name="nomor_surat" class="form-input w-full border-gray-300 rounded focus:ring-blue-500" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Tanggal Surat</label>
            <input type="date" name="tanggal_surat" class="form-input w-full border-gray-300 rounded focus:ring-blue-500" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Tanggal Surat Pemohon</label>
            <input type="date" name="tanggal_surat_pemohon" class="form-input w-full border-gray-300 rounded focus:ring-blue-500" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Jenis Cuti</label>
            <select name="jenis_cuti" id="jenis_cuti" class="form-select w-full border-gray-300 rounded focus:ring-blue-500" required>
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

        <div id="alasan_lainnya_box" class="hidden">
            <label class="block text-gray-700 font-semibold mb-2">Alasan Cuti Lainnya</label>
            <input type="text" name="alasan_lainnya" id="alasan_lainnya" class="form-input w-full border-gray-300 rounded focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Terhitung Mulai</label>
            <input type="date" name="terhitung_mulai" class="form-input w-full border-gray-300 rounded focus:ring-blue-500" required>
        </div>
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Terhitung Hingga</label>
            <input type="date" name="terhitung_hingga" class="form-input w-full border-gray-300 rounded focus:ring-blue-500" required>
        </div>
        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-200">Kirim</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const jenisCuti = document.getElementById('jenis_cuti');
        const alasanBox = document.getElementById('alasan_lainnya_box');
        const alasanInput = document.getElementById('alasan_lainnya');

        function toggleAlasanBox() {
            if (jenisCuti.value === 'Lainnya') {
                alasanBox.classList.remove('hidden');
                alasanInput.required = true;
            } else {
                alasanBox.classList.add('hidden');
                alasanInput.required = false;
                alasanInput.value = '';
            }
        }

        jenisCuti.addEventListener('change', toggleAlasanBox);

        // In case of validation error and old value is Lainnya
        toggleAlasanBox();
    });
</script>
@endsection