@extends('layouts.admin')

@section('title', 'Update Pewawancara')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Update Pewawancara</h1>
        <p class="text-sm text-text-muted">Perbarui informasi pewawancara.</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        @if(isset($pewawancara))
            <form action="{{ route('pewawancara.update', $pewawancara->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-y-6">

                    <div>
                        <label for="jabatan_pewawancara" class="block text-sm font-medium text-gray-700 mb-1">
                            Jabatan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="jabatan_pewawancara" id="jabatan_pewawancara" 
                               value="{{ old('jabatan_pewawancara', $pewawancara->jabatan_pewawancara) }}"
                               class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm" 
                               required>
                        @error('jabatan_pewawancara') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="dokumen_pewawancara" class="block text-sm font-medium text-gray-700 mb-1">
                            Dokumen CV (PDF)
                        </label>
                        @if ($pewawancara->dokumen_pewawancara)
                            <p class="text-xs text-gray-500 mb-2">
                                File saat ini: 
                                <a href="{{ asset('storage/' . $pewawancara->dokumen_pewawancara) }}" target="_blank" class="text-blue-600 hover:underline">
                                    {{ basename($pewawancara->dokumen_pewawancara) }}
                                </a>
                            </p>
                        @endif
                        <input type="file" name="dokumen_pewawancara" id="dokumen_pewawancara" accept="application/pdf"
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin mengubah dokumen.</p>
                        @error('dokumen_pewawancara') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                    <a href="{{ route('pewawancara.index') }}" 
                       class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Batal
                    </a>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update Pewawancara
                    </button>
                </div>
            </form>
        @else
            <p class="text-center text-gray-500">Data pewawancara tidak ditemukan.</p>
            <div class="mt-4 text-center">
                <a href="{{ route('pewawancara.index') }}" class="text-blue-600 hover:text-blue-800">
                    Kembali ke Daftar Pewawancara
                </a>
            </div>
        @endif
    </div>
@endsection
