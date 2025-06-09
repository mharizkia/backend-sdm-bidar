@extends('layouts.admin')

@section('title', 'Jumlah Pegawai')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.dashboard') }}" 
       class="inline-flex items-center px-4 py-2 bg-white hover:bg-gray-100 text-gray-700 text-sm font-medium rounded-md shadow-sm border border-gray-300 transition-colors duration-150 ease-in-out">
        <i class="fas fa-arrow-left mr-2"></i>
        Kembali ke Dashboard
    </a>
</div>

<div class="bg-white p-0 shadow-lg rounded-lg overflow-hidden">
    <div class="bg-[#1D3F8E] text-white p-4">
        <h2 class="text-xl font-semibold">Tabel Jumlah Pegawai</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr class="bg-gray-100">
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">
                        Dosen/Karyawan
                    </th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">
                        Laki-Laki
                    </th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">
                        Perempuan
                    </th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">
                        Jumlah
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">
                        Dosen
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        {{ $dataRingkasan['dosen']['laki_laki'] ?? '0' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        {{ $dataRingkasan['dosen']['perempuan'] ?? '0' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        {{ $dataRingkasan['dosen']['jumlah'] ?? '0' }}
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">
                        Karyawan
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        {{ $dataRingkasan['karyawan']['laki_laki'] ?? '0' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        {{ $dataRingkasan['karyawan']['perempuan'] ?? '0' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        {{ $dataRingkasan['karyawan']['jumlah'] ?? '0' }}
                    </td>
                </tr>
                <tr class="bg-gray-50 font-semibold">
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                        Total Keseluruhan
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                        {{ $totalLakiLaki ?? '0' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                        {{ $totalPerempuan ?? '0' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                        {{ $totalPegawaiKeseluruhan ?? '0' }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection