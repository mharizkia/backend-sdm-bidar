@extends('layouts.admin')

@section('title', 'Input Data Pelamar')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Input Data Pelamar</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        @if (session()->has('message'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('pelamar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-y-6">

                <div>
                    <label for="nama_pelamar" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama_pelamar" id="nama_pelamar"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3"
                        value="{{ old('nama_pelamar') }}">
                    @error('nama_pelamar') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="nidn" class="block text-sm font-medium text-gray-700 mb-1">
                        NIDN
                    </label>
                    <input type="text" name="nidn" id="nidn"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3"
                        value="{{ old('nidn') }}">
                    @error('nidn') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-1">
                        Tempat Lahir <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3"
                        value="{{ old('tempat_lahir') }}">
                    @error('tempat_lahir') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">
                        Tanggal Lahir <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3"
                        value="{{ old('tanggal_lahir') }}">
                    @error('tanggal_lahir') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-1">
                        Jenis Kelamin <span class="text-red-500">*</span>
                    </label>
                    <select id="jenis_kelamin" name="jenis_kelamin"
                        class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                        <option value="">-Pilih Jenis Kelamin-</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" name="email" id="email"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3"
                        value="{{ old('email') }}">
                    @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1">
                        No HP <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="no_hp" id="no_hp"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3"
                        value="{{ old('no_hp') }}">
                    @error('no_hp') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">
                        Alamat <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="alamat" id="alamat"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3"
                        value="{{ old('alamat') }}">
                    @error('alamat') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="pendidikan_tertinggi" class="block text-sm font-medium text-gray-700 mb-1">
                        Pendidikan Tertinggi <span class="text-red-500">*</span>
                    </label>
                    <select id="pendidikan_tertinggi" name="pendidikan_tertinggi"
                        class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                        <option value="">-Pilih Pendidikan terakhir-</option>
                        <option value="SMA" {{ old('pendidikan_tertinggi') == 'SMA' ? 'selected' : '' }}>SMA</option>
                        <option value="DIPLOMA-3" {{ old('pendidikan_tertinggi') == 'DIPLOMA-3' ? 'selected' : '' }}>D3</option>
                        <option value="STRATA-1" {{ old('pendidikan_tertinggi') == 'STRATA-1' ? 'selected' : '' }}>S1</option>
                        <option value="STRATA-2" {{ old('pendidikan_tertinggi') == 'STRATA-2' ? 'selected' : '' }}>S2</option>
                        <option value="STRATA-3" {{ old('pendidikan_tertinggi') == 'STRATA-3' ? 'selected' : '' }}>S3</option>
                    </select>
                    @error('pendidikan_tertinggi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="umur" class="block text-sm font-medium text-gray-700 mb-1">
                        Umur <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="umur" id="umur" min="0"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3"
                        value="{{ old('umur') }}">
                    @error('umur') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="ipk" class="block text-sm font-medium text-gray-700 mb-1">
                        IPK <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="ipk" id="ipk" step="0.01" min="0" max="4"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3"
                        value="{{ old('ipk') }}">
                    @error('ipk') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="bidang_ilmu_kompetensi" class="block text-sm font-medium text-gray-700 mb-1">
                        Bidang Ilmu Kompetensi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="bidang_ilmu_kompetensi" id="bidang_ilmu_kompetensi"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3"
                        value="{{ old('bidang_ilmu_kompetensi') }}">
                    @error('bidang_ilmu_kompetensi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="pilihan_lamaran" class="block text-sm font-medium text-gray-700 mb-1">
                        Pilihan Lamaran <span class="text-red-500">*</span>
                    </label>
                    <select id="pilihan_lamaran" name="pilihan_lamaran"
                        class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                        <option value="">-Dosen/Karyawan-</option>
                        <option value="dosen" {{ old('pilihan_lamaran') == 'dosen' ? 'selected' : '' }}>Dosen</option>
                        <option value="karyawan" {{ old('pilihan_lamaran') == 'karyawan' ? 'selected' : '' }}>Karyawan</option>
                    </select>
                    @error('pilihan_lamaran') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="tanggal_lamaran" class="block text-sm font-medium text-gray-700 mb-1">
                        Tanggal Lamaran <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="tanggal_lamaran" id="tanggal_lamaran"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3"
                        value="{{ old('tanggal_lamaran') }}">
                    @error('tanggal_lamaran') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="dokumen_lamaran" class="block text-sm font-medium text-gray-700 mb-1">
                        Dokumen Lamaran (PDF) <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1">
                        <input type="file" name="dokumen_lamaran" id="dokumen_lamaran"
                            accept="application/pdf"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <p class="mt-1 text-xs text-gray-500">Pilih Dokumen Max. 10 MB</p>
                    </div>
                    @error('dokumen_lamaran') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('pelamar.index') }}"
                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection