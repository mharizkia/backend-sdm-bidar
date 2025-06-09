@extends('layouts.admin')

@section('title', 'Tambah Dosen')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Tambah Data Dosen</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        <form action="{{ route('dosen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-y-6">
                <div>
                    <label for="kode_dosen" class="block text-sm font-medium text-gray-700 mb-1">Kode Dosen <span class="text-red-500">*</span></label>
                    <input type="text" name="kode_dosen" id="kode_dosen" value="{{ old('kode_dosen') }}"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm" required>
                </div>
                <div>
                    <label for="nama_dosen" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_dosen" id="nama_dosen" value="{{ old('nama_dosen') }}"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm" required>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input type="password" name="password" id="password"
                            class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm pr-10" required>
                        <button type="button" id="togglePassword" tabindex="-1"
                            class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500 focus:outline-none"
                            onclick="togglePasswordVisibility()">
                            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div>
                    <label for="nidn" class="block text-sm font-medium text-gray-700 mb-1">NIDN</label>
                    <input type="text" name="nidn" id="nidn" value="{{ old('nidn') }}"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                </div>
                <div>
                    <label for="nik_ktp" class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
                    <input type="text" name="nik_ktp" id="nik_ktp" value="{{ old('nik_ktp') }}"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                </div>
                <div>
                    <label for="nip" class="block text-sm font-medium text-gray-700 mb-1">NIP</label>
                    <input type="text" name="nip" id="nip" value="{{ old('nip') }}"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                </div>
                <div>
                    <label for="gelar_depan" class="block text-sm font-medium text-gray-700 mb-1">Gelar Depan</label>
                    <input type="text" name="gelar_depan" id="gelar_depan" value="{{ old('gelar_depan') }}"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                </div>
                <div>
                    <label for="gelar_belakang" class="block text-sm font-medium text-gray-700 mb-1">Gelar Belakang</label>
                    <input type="text" name="gelar_belakang" id="gelar_belakang" value="{{ old('gelar_belakang') }}"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                </div>
                <div>
                    <label for="umur" class="block text-sm font-medium text-gray-700 mb-1">Umur</label>
                    <input type="number" name="umur" id="umur" value="{{ old('umur') }}"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm" min="0" max="120">
                </div>
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="2"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">{{ old('alamat') }}</textarea>
                </div>
                <div>
                    <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                </div>
                <div>
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                </div>
                <div>
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin"
                        class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                        <option value="">-Pilih-</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label for="golongan_darah" class="block text-sm font-medium text-gray-700 mb-1">Golongan Darah</label>
                    <select name="golongan_darah" id="golongan_darah"
                        class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                        <option value="">-Pilih-</option>
                        <option value="A" {{ old('golongan_darah') == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ old('golongan_darah') == 'B' ? 'selected' : '' }}>B</option>
                        <option value="AB" {{ old('golongan_darah') == 'AB' ? 'selected' : '' }}>AB</option>
                        <option value="O" {{ old('golongan_darah') == 'O' ? 'selected' : '' }}>O</option>
                    </select>
                </div>
                <div>
                    <label for="agama" class="block text-sm font-medium text-gray-700 mb-1">Agama</label>
                    <select name="agama" id="agama"
                        class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                        <option value="">-Pilih-</option>
                        <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                        <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    </select>
                </div>
                <div>
                    <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1">Nomor HP</label>
                    <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                </div>
                <div>
                    <label for="no_npwp" class="block text-sm font-medium text-gray-700 mb-1">No NPWP</label>
                    <input type="text" name="no_npwp" id="no_npwp" value="{{ old('no_npwp') }}"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                </div>
                <div>
                    <label for="fakultas_id" class="block text-sm font-medium text-gray-700 mb-1">Fakultas</label>
                    <select id="fakultas_id" name="fakultas_id"
                        class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                        <option value="">-Pilih-</option>
                        @foreach($fakultas as $f)
                            <option value="{{ $f->id }}" {{ old('fakultas_id') == $f->id ? 'selected' : '' }}>{{ $f->nama_fakultas }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="prodi_id" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                    <select id="prodi_id" name="prodi_id"
                        class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                        <option value="">-Pilih-</option>
                    </select>
                </div>
                <div>
                    <label for="bidang_ilmu_kompetensi" class="block text-sm font-medium text-gray-700 mb-1">Bidang Ilmu Kompetensi</label>
                    <input type="text" name="bidang_ilmu_kompetensi" id="bidang_ilmu_kompetensi" value="{{ old('bidang_ilmu_kompetensi') }}"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                </div>
                <div >
                    <label for="ikatan_kerja" class="block text-sm font-medium text-gray-700 mb-1">Ikatan Kerja</label>
                    <select name="ikatan_kerja" id="ikatan_kerja" class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                        <option value="">Pilih Ikatan Kerja</option>
                        <option value="luar_biasa" {{ old('ikatan_kerja') == 'luar_biasa' ? 'selected' : '' }}>Luar Biasa</option>
                        <option value="balon_dosen" {{ old('ikatan_kerja') == 'balon_dosen' ? 'selected' : '' }}>Balon Dosen</option>
                        <option value="calon_dosen" {{ old('ikatan_kerja') == 'calon_dosen' ? 'selected' : '' }}>Calon Dosen</option>
                        <option value="dosen_tetap" {{ old('ikatan_kerja') == 'dosen_tetap' ? 'selected' : '' }}>Dosen Tetap</option>
                        <option value="dosen_pns" {{ old('ikatan_kerja') == 'dosen_pns' ? 'selected' : '' }}>Dosen PNS</option>
                    </select>
                </div>
                <div>
                    <label for="akhir_ikatan_kerja" class="block text-sm font-medium text-gray-700 mb-1">Akhir Ikatan Kerja</label>
                    <select name="akhir_ikatan_kerja" id="akhir_ikatan_kerja"
                        class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                        <option value="">Pilih Durasi Ikatan Kerja</option>
                        <option value="{{ \Carbon\Carbon::now()->addMonths(1)->format('Y-m-d') }}">1 Bulan</option>
                        <option value="{{ \Carbon\Carbon::now()->addMonths(3)->format('Y-m-d') }}">3 Bulan</option>
                        <option value="{{ \Carbon\Carbon::now()->addMonths(6)->format('Y-m-d') }}">6 Bulan</option>
                        <option value="{{ \Carbon\Carbon::now()->addMonths(12)->format('Y-m-d') }}">12 Bulan</option>
                    </select>
                    <small class="text-gray-500">Tanggal akhir otomatis terisi sesuai pilihan durasi dari hari ini.</small>
                </div>
                <div>
                    <label for="tanggal_mulai_kerja" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai Kerja</label>
                    <input type="date" name="tanggal_mulai_kerja" id="tanggal_mulai_kerja" value="{{ old('tanggal_mulai_kerja') }}"
                        class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                </div>
                <div>
                    <label for="pendidikan_tertinggi" class="block text-sm font-medium text-gray-700 mb-1">Pendidikan Tertinggi</label>
                    <select name="pendidikan_tertinggi" id="pendidikan_tertinggi"
                        class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                        <option value="">-Pilih-</option>
                        <option value="SMA" {{ old('pendidikan_tertinggi') == 'SMA' ? 'selected' : '' }}>SMA/SMK</option>
                        <option value="DIPLOMA-3" {{ old('pendidikan_tertinggi') == 'DIPLOMA-3' ? 'selected' : '' }}>D3</option>
                        <option value="DIPLOMA-4" {{ old('pendidikan_tertinggi') == 'DIPLOMA-4' ? 'selected' : '' }}>D4</option>
                        <option value="STRATA-1" {{ old('pendidikan_tertinggi') == 'STRATA-1' ? 'selected' : '' }}>S1</option>
                        <option value="STRATA-2" {{ old('pendidikan_tertinggi') == 'STRATA-2' ? 'selected' : '' }}>S2</option>
                        <option value="STRATA-3" {{ old('pendidikan_tertinggi') == 'STRATA-3' ? 'selected' : '' }}>S3</option>
                    </select>
                </div>
                <div>
                    <label for="jabatan_akademik_id" class="block text-sm font-medium text-gray-700 mb-1">Jabatan Akademik</label>
                    <select id="jabatan_akademik_id" name="jabatan_akademik_id"
                        class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                        <option value="">-Pilih-</option>
                        @foreach($jabatanAkademik as $ja)
                            <option value="{{ $ja->id }}" {{ old('jabatan_akademik_id') == $ja->id ? 'selected' : '' }}>{{ $ja->nama_jabatan_akademik }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="golongan_id" class="block text-sm font-medium text-gray-700 mb-1">Golongan</label>
                    <select id="golongan_id" name="golongan_id"
                        class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                        <option value="">-Pilih-</option>
                    </select>
                </div>
                <div>
                    <label for="foto_dosen" class="block text-sm font-medium text-gray-700 mb-1">Foto Dosen</label>
                    <input type="file" name="foto_dosen" id="foto_dosen" accept="image/*"
                        class="form-input mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300">
                </div>
                <div>
                    <label for="dokumen_dosen" class="block text-sm font-medium text-gray-700 mb-1">Dokumen Dosen</label>
                    <input type="file" name="dokumen_dosen" id="dokumen_dosen" accept="application/pdf"
                        class="form-input mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300">
                </div>
                <div>
                    <label for="status_aktivasi" class="block text-sm font-medium text-gray-700 mb-1">Status Aktivasi</label>
                    <select name="status_aktivasi" id="status_aktivasi"
                        class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm">
                        <option value="aktif" {{ old('status_aktivasi') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak_aktif" {{ old('status_aktivasi') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('dosen.index') }}"
                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    Simpan Data Dosen
                </button>
            </div>
        </form>
    </div>

    {{-- Script Dependent Dropdown Fakultas dan Jabatan Akademik --}}
    <script>
        $('#fakultas_id').on('change', function () {
            var fakultasId = $(this).val();
            $('#prodi_id').html('<option value="">Loading...</option>');
            if (fakultasId) {
                $.get('/get-prodi/' + fakultasId, function (data) {
                    $('#prodi_id').empty().append('<option value="">-Pilih-</option>');
                    $.each(data, function (key, value) {
                        $('#prodi_id').append('<option value="'+ value.id +'">'+ value.jenjang.kode_jenjang + ' ' + value.nama_prodi +'</option>');
                    });
                });
            } else {
                $('#prodi_id').html('<option value="">-Pilih-</option>');
            }
        });

        $('#jabatan_akademik_id').on('change', function () {
            var jabatanAkademikId = $(this).val();
            $('#golongan_id').html('<option value="">Loading...</option>');
            if (jabatanAkademikId) {
                $.get('/get-golongan/' + jabatanAkademikId, function (data) {
                    $('#golongan_id').empty().append('<option value="">-Pilih-</option>');
                    $.each(data, function (key, value) {
                        $('#golongan_id').append('<option value="'+ value.id +'">'+ value.nama_golongan +'</option>');
                    });
                });
            } else {
                $('#golongan_id').html('<option value="">-Pilih-</option>');
            }
        });
    </script>

    {{-- Script untuk menampilkan input password --}}
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.956 9.956 0 012.293-3.95m1.414-1.414A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.956 9.956 0 01-4.293 5.95M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3l18 18" />`;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
            }
        }
    </script>
@endsection