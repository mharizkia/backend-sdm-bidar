@extends('layouts.admin')

@section('title', 'Tambah Role Baru')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Tambah Role Baru</h1>
        <p class="text-sm text-text-muted">Buat peran pengguna baru dalam sistem.</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-y-6">
                <div>
                    <label for="nama_role" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Role <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama_role" id="nama_role" value="{{ old('nama_role') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                    @error('nama_role') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">
                        Deskripsi
                    </label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" 
                              class="form-textarea mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('admin.roles.index') }}" 
                   class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Batal
                </a>
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Simpan Role
                </button>
            </div>
        </form>
    </div>
@endsection