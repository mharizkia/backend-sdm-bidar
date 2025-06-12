@extends('layouts.pegawai')

@section('title', 'Pengajuan Cuti')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Pengajuan Cuti</h1>
        <p class="text-sm text-text-muted">Isi formulir di bawah ini untuk mengajukan permohonan cuti.</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        <form method="POST" action="{{ route('cuti.store') }}" class="space-y-6">
            @csrf

            <div>
                <label for="nomor_surat" class="block text-sm font-medium text-gray-700 mb-1">Nomor Surat</label>
                <input type="text" name="nomor_surat" id="nomor_surat" value="{{ old('nomor_surat') }}"
                       class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
            </div>

            <div>
                <label for="tanggal_surat" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Surat</label>
                <input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ old('tanggal_surat') }}"
                       class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
            </div>

            <div>
                <label for="tanggal_surat_pemohon" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Surat Pemohon</label>
                <input type="date" name="tanggal_surat_pemohon" id="tanggal_surat_pemohon" value="{{ old('tanggal_surat_pemohon') }}"
                       class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
            </div>

            <div>
                <label for="jenis_cuti" class="block text-sm font-medium text-gray-700 mb-1">Jenis Cuti</label>
                <select name="jenis_cuti" id="jenis_cuti" class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                    <option value="">-Pilih Jenis Cuti-</option>
                    <option value="Tahunan" {{ old('jenis_cuti') == 'Tahunan' ? 'selected' : '' }}>Cuti Tahunan</option>
                    <option value="Belajar" {{ old('jenis_cuti') == 'Belajar' ? 'selected' : '' }}>Cuti Belajar</option>
                    <option value="Melahirkan" {{ old('jenis_cuti') == 'Melahirkan' ? 'selected' : '' }}>Cuti Melahirkan</option>
                    <option value="Pernikahan" {{ old('jenis_cuti') == 'Pernikahan' ? 'selected' : '' }}>Cuti Pernikahan</option>
                    <option value="Pelatihan" {{ old('jenis_cuti') == 'Pelatihan' ? 'selected' : '' }}>Cuti Pelatihan</option>
                    @if(auth()->user() && auth()->user()->hasRole('dosen')) {{-- Menambahkan pengecekan auth()->user() untuk keamanan --}}
                        <option value="Mengajar" {{ old('jenis_cuti') == 'Mengajar' ? 'selected' : '' }}>Cuti Mengajar</option>
                    @endif
                    <option value="Lainnya" {{ old('jenis_cuti') == 'Lainnya' ? 'selected' : '' }}>Cuti Lainnya</option>
                </select>
            </div>

            <div id="alasan_lainnya_box" class="{{ old('jenis_cuti') === 'Lainnya' ? '' : 'hidden' }}">
                <label for="alasan_lainnya" class="block text-sm font-medium text-gray-700 mb-1">Alasan Cuti Lainnya</label>
                <input type="text" name="alasan_lainnya" id="alasan_lainnya" value="{{ old('alasan_lainnya') }}"
                       class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            </div>

            <div>
                <label for="terhitung_mulai" class="block text-sm font-medium text-gray-700 mb-1">Terhitung Mulai</label>
                <input type="date" name="terhitung_mulai" id="terhitung_mulai" value="{{ old('terhitung_mulai') }}"
                       class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
            </div>
            <div>
                <label for="terhitung_hingga" class="block text-sm font-medium text-gray-700 mb-1">Terhitung Hingga</label>
                <input type="date" name="terhitung_hingga" id="terhitung_hingga" value="{{ old('terhitung_hingga') }}"
                       class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ url()->previous() }}" 
                   class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Batal
                </a>
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Kirim Pengajuan
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
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

        toggleAlasanBox();
    });
</script>
@endpush
