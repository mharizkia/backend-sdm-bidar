@extends('layouts.admin')

@section('title', 'Data Dosen')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Data Dosen</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-[#1D3F8E] text-white p-4">
            <h2 class="text-xl font-semibold">Tabel Data Dosen</h2>
        </div>

        <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-3 w-full sm:w-auto">
                <div class="w-full sm:w-auto">
                    <input type="text" id="search" placeholder="Cari nama/kode/email..." class="form-input w-full sm:w-60 rounded-md border-gray-300 shadow-sm text-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2">
                </div>
            </div>
            <div class="flex flex-wrap items-center space-x-0 sm:space-x-2 space-y-2 sm:space-y-0 w-full sm:w-auto justify-start sm:justify-end">
                <a href="{{ route('dosen.create') }}" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                    <i class="fas fa-plus mr-2"></i>Input Data Dosen
                </a>
                <a href="{{ route('dosen.export') }}" class="w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                    <i class="fas fa-file-excel mr-2"></i>Export Data Dosen
                </a>
            </div>
        </div>

        <div id="result">
            @include('admin.dosen.result', ['dosens' => $dosens])
        </div>
    </div>

    <script>
    $(document).ready(function () {
        $('#search').on('input', function () {
            let keyword = $(this).val();
            $.ajax({
                url: '{{ route("dosen.search") }}',
                method: 'GET',
                data: { search: keyword },
                success: function (res) {
                    $('#result').html(res.html);
                }
            });
        });
    });
    </script>
@endsection