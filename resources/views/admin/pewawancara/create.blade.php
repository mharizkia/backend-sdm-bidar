@extends('layouts.admin')

@section('title', 'Tambah Pewawancara')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Tambah Pewawancara</h1>
        <p class="text-sm text-text-muted">Kelola daftar pewawancara untuk proses rekrutmen.</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        <form action="{{ route('pewawancara.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-y-6">

                <div>
                    <label for="nama_pewawancara" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Pewawancara <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama_pewawancara" id="nama_pewawancara" value="{{ old('nama_pewawancara') }}"
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                </div>
                
                <div>
                    <label for="jabatan_pewawancara" class="block text-sm font-medium text-gray-700 mb-1">
                        Jabatan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="jabatan_pewawancara" id="jabatan_pewawancara" value="{{ old('jabatan_pewawancara') }}"
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                </div>

                <div>
                    <label for="dokumen_pewawancara" class="block text-sm font-medium text-gray-700 mb-1">
                        Dokumen CV <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1">
                        <input type="file" name="dokumen_pewawancara" id="dokumen_pewawancara" required
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <p class="mt-1 text-xs text-gray-500">Tipe file yang diizinkan: PDF, DOC, DOCX. Max: 5 MB.</p>
                    </div>
                </div>

            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('pewawancara.index') }}" 
                   class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Batal
                </a>
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Simpan Pewawancara
                </button>
            </div>
        </form>
    </div>
@endsection
