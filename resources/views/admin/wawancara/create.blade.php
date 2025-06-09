@extends('layouts.admin')

@section('title', 'Input Data Wawancara')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Input Data Wawancara</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
        <form method="GET" action="{{ route('wawancara.create') }}" class="mt-2 flex items-center space-x-2">
            <label for="kode" class="text-sm font-medium text-gray-700">Kode Pelamar:</label>
            <input type="text" name="kode" id="kode" class="border p-1 rounded text-sm" value="{{ request('kode') }}">
            <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded text-sm">Cari</button>
        </form>
        @if (session('not_found'))
            <div class="text-red-600 mt-2">{{ session('not_found') }}</div>
        @endif
        @if($pelamar)
            <div class="mt-2 p-2 border rounded bg-gray-50">
                <p><strong>Kode:</strong> {{ $pelamar->kode }}</p>
                <p><strong>Nama:</strong> {{ $pelamar->nama_pelamar }}</p>
                <p><strong>Pilihan Lamaran:</strong> {{ $pelamar->pilihan_lamaran }}</p>
            </div>
        @endif
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        <form action="{{ route('wawancara.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($pelamar)
                <input type="hidden" name="pelamar_id" value="{{ $pelamar->id }}">
            @endif

            <div class="space-y-6">
                <div>
                    <label for="pewawancara_id" class="block text-sm font-medium text-gray-700 mb-1">
                        Pilih Pewawancara <span class="text-red-500">*</span>
                    </label>
                    <select name="pewawancara_id" id="pewawancara_id" class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3" onchange="tampilkanPanduan(this)">
                        <option value="">-- Pilih --</option>
                        @foreach ($daftarPewawancara as $p)
                            <option value="{{ $p->id }}">{{ $p->jabatan_pewawancara }}</option>
                        @endforeach
                    </select>
                </div>

                <div id="panduanContainer" class="mt-2 hidden">
                    @foreach ($daftarPewawancara as $p)
                        @if ($p->dokumen_pewawancara)
                            <div class="panduan" data-id="{{ $p->id }}" style="display: none;">
                                <iframe src="{{ asset('storage/' . $p->dokumen_pewawancara) }}" width="100%" height="400px" class="border"></iframe>
                                <a href="{{ asset('storage/' . $p->dokumen_pewawancara) }}" download class="text-blue-500 underline block mt-2">Download Dokumen Pewawancara</a>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div>
                    <label for="nama_pewawancara" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Pewawancara <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama_pewawancara" id="nama_pewawancara" value="{{ old('nama_pewawancara') }}"
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                </div>

                <div>
                    <label for="tanggal_wawancara" class="block text-sm font-medium text-gray-700 mb-1">
                        Tanggal Wawancara <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="tanggal_wawancara" id="tanggal_wawancara" value="{{ old('tanggal_wawancara') }}"
                           class="form-input block w-full sm:w-1/2 lg:w-1/3 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                </div>

                <div>
                    <label for="kesimpulan" class="block text-sm font-medium text-gray-700 mb-1">
                        Kesimpulan <span class="text-red-500">*</span>
                    </label>
                    <textarea name="kesimpulan" id="kesimpulan" rows="4"
                              class="form-textarea block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">{{ old('kesimpulan') }}</textarea>
                </div>

                <div>
                    <label for="hasil_wawancara" class="block text-sm font-medium text-gray-700 mb-1">
                        Upload Hasil Wawancara (PDF) <span class="text-red-500">*</span>
                    </label>
                    <input type="file" name="hasil_wawancara" id="hasil_wawancara" accept="application/pdf"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <p class="mt-1 text-xs text-gray-500">Pilih Dokumen Max. 10 MB</p>
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select name="status" id="status" class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                        <option value="">-- Pilih --</option>
                        <option value="lulus" {{ old('status') == 'lulus' ? 'selected' : '' }}>Lulus</option>
                        <option value="tidak_lulus" {{ old('status') == 'tidak_lulus' ? 'selected' : '' }}>Tidak Lulus</option>
                    </select>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('wawancara.index') }}"
                   class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Batal
                </a>
                <button type="submit" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                    Simpan
                </button>
            </div>
        </form>
    </div>

    <script>
        function tampilkanPanduan(select) {
            document.querySelectorAll('.panduan').forEach(el => el.style.display = 'none');
            let selectedId = select.value;
            let target = document.querySelector('.panduan[data-id="' + selectedId + '"]');
            if (target) {
                document.getElementById('panduanContainer').classList.remove('hidden');
                target.style.display = 'block';
            } else {
                document.getElementById('panduanContainer').classList.add('hidden');
            }
        }
    </script>
@endsection