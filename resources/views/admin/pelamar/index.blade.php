@extends('layouts.admin')

@section('title', 'Data Pelamar')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Data Pelamar</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-[#1D3F8E] text-white p-4">
            <h2 class="text-xl font-semibold">Tabel Data Pelamar</h2>
        </div>

        <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-3 w-full sm:w-auto">
                <div class="w-full sm:w-auto">
                    <input type="text" id="search" placeholder="Cari...." class="form-input w-full sm:w-60 rounded-md border-gray-300 shadow-sm text-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2">
                </div>
                <div class="relative w-full sm:w-auto">
                    <button type="button" id="filterPelamarButton" class="w-full sm:w-auto bg-white hover:bg-gray-50 text-gray-700 font-medium py-2 px-4 border border-gray-300 rounded-md shadow-sm inline-flex items-center justify-center text-sm h-full">
                        <span>Filter</span>
                        <i class="fas fa-chevron-down ml-2 text-sm"></i>
                    </button>
                    <div id="filterPelamarMenu" class="origin-top-left absolute left-0 mt-2 w-64 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-50 p-4" role="menu" aria-orientation="vertical" aria-labelledby="filterPelamarButton">
                        <div class="mb-3">
                            <label class="block text-xs font-semibold mb-1">Pilihan Lamaran</label>
                            <select id="filter-pilihan" class="form-input w-full rounded-md border-gray-300 text-sm">
                                <option value="">Semua</option>
                                <option value="dosen">Dosen</option>
                                <option value="karyawan">Karyawan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="block text-xs font-semibold mb-1">Jenis Kelamin</label>
                            <select id="filter-jk" class="form-input w-full rounded-md border-gray-300 text-sm">
                                <option value="">Semua</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <button type="button" id="filterPelamarApply" class="bg-blue-600 hover:bg-blue-700 text-white py-1 px-4 rounded text-sm w-full">Terapkan</button>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap items-center space-x-0 sm:space-x-2 space-y-2 sm:space-y-0 w-full sm:w-auto justify-start sm:justify-end">
                <a href="{{ route('pelamar.create') }}" class="w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                    <i class="fas fa-plus mr-2"></i>Input Data Pelamar
                </a>
                <a href="{{ route('pelamar.export') }}" class="w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                    <i class="fas fa-file-excel mr-2"></i>Export Excel
                </a>
            </div>
        </div>

        <div id="result">
            @include('admin.pelamar.result', ['pelamars' => $pelamars])
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterButton = document.getElementById('filterPelamarButton');
        const filterMenu = document.getElementById('filterPelamarMenu');
        const filterApply = document.getElementById('filterPelamarApply');

        if (filterButton && filterMenu) {
            filterButton.addEventListener('click', function (event) {
                event.stopPropagation();
                filterMenu.classList.toggle('hidden');
            });

            window.addEventListener('click', function (event) {
                if (filterMenu && !filterMenu.classList.contains('hidden') && !filterButton.contains(event.target) && !filterMenu.contains(event.target)) {
                    filterMenu.classList.add('hidden');
                }
            });
            document.addEventListener('keydown', function (event) {
                if (filterMenu && event.key === 'Escape' && !filterMenu.classList.contains('hidden')) {
                    filterMenu.classList.add('hidden');
                }
            });
        }

        if (filterApply) {
            filterApply.addEventListener('click', function () {
                loadPelamar();
                filterMenu.classList.add('hidden');
            });
        }

        $('#search').on('input', function () {
            loadPelamar();
        });

        function loadPelamar() {
            let keyword = $('#search').val();
            let pilihan = $('#filter-pilihan').val();
            let jk = $('#filter-jk').val();

            $.ajax({
                url: '{{ route("pelamar.search") }}',
                method: 'GET',
                data: { search: keyword, pilihan: pilihan, jk: jk },
                success: function (res) {
                    $('#result').html(res.html);
                }
            });
        }
    });
    </script>
@endsection
