@extends('layouts.admin')

@section('title', 'Input Data Tes Psikologi')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Input Data Tes Psikologi</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <form method="GET" action="{{ route('psikologi.create') }}" class="flex items-center space-x-2 mb-4">
        <label for="kode" class="block text-sm font-medium text-gray-700 mb-1">Kode Pelamar</label>
        <input type="text" name="kode" id="kode" value="{{ request('kode') }}" class="border p-1 rounded text-sm">
        <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded text-sm">Cari</button>
    </form>
    @if (session('not_found'))
        <div class="text-red-600 mt-2">{{ session('not_found') }}</div>
    @endif

    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        <form action="{{ route('psikologi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-6">

                @if(isset($pelamar) && $pelamar)
                <div class="mt-2 p-2 border rounded bg-gray-50">
                    <p><strong>Kode:</strong> {{ $pelamar->kode }}</p>
                    <p><strong>Nama:</strong> {{ $pelamar->nama_pelamar }}</p>
                    <p><strong>Pilihan Lamaran:</strong> {{ $pelamar->pilihan_lamaran }}</p>
                    <input type="hidden" name="pelamar_id" value="{{ $pelamar->id }}">
                </div>
                @endif

                <div>
                    <label for="tanggal_psikologis" class="block text-sm font-medium text-gray-700 mb-1">
                        Tanggal Tes Psikologi <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="tanggal_psikologis" id="tanggal_psikologis" value="{{ old('tanggal_psikologis') }}"
                           class="form-input block w-full sm:w-1/2 lg:w-1/3 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3" required>
                </div>

                @isset($poinPsikologisPath)
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Panduan Tes Psikologi
                    </label>
                    <iframe src="{{ asset('storage/' . $poinPsikologisPath) }}" width="100%" height="400px" class="border"></iframe>
                    <a href="{{ asset('storage/' . $poinPsikologisPath) }}" download class="text-blue-500 underline block mt-2">Download Panduan Psikologis</a>
                </div>
                @endisset

                <div>
                    <label for="hasil_psikologis" class="block text-sm font-medium text-gray-700 mb-1">
                        Upload Hasil Psikologis (PDF) <span class="text-red-500">*</span>
                    </label>
                    <input type="file" name="hasil_psikologis" id="hasil_psikologis" accept="application/pdf"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <p class="mt-1 text-xs text-gray-500">Pilih Dokumen Max. 10 MB</p>
                </div>

                <div>
                    <label for="kesimpulan" class="block text-sm font-medium text-gray-700 mb-1">
                        Kesimpulan <span class="text-red-500">*</span>
                    </label>
                    <textarea name="kesimpulan" id="kesimpulan" rows="4"
                              class="form-textarea block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3" required>{{ old('kesimpulan') }}</textarea>
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select name="status" id="status"
                            class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="lulus" {{ old('status') == 'lulus' ? 'selected' : '' }}>Lulus</option>
                        <option value="tidak_lulus" {{ old('status') == 'tidak_lulus' ? 'selected' : '' }}>Tidak Lulus</option>
                    </select>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('psikologi.index') }}"
                   class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Batal
                </a>
                <button type="submit" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                    Simpan Data
                </button>
            </div>
        </form>
        @if (session('success'))
            <div class="mt-4 text-green-600">{{ session('success') }}</div>
        @endif
    </div>
@endsection