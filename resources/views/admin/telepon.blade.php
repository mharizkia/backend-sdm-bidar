@extends('layouts.admin')

@section('title', 'Telepon')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-text-dark">Daftar Telepon</h1>
    <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
</div>
<div class="bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="bg-[#1D3F8E] text-white p-4">
        <h2 class="text-xl font-semibold">Tabel Daftar Telepon</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Nama</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Jenis</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">No HP</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-700">
                @forelse ($dosens as $dosen)
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap text-center font-medium">{{ $dosen->nama_dosen }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-center">Dosen</td>
                    <td class="px-4 py-3 whitespace-nowrap text-center">{{ $dosen->no_hp }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-4 py-4 text-center text-sm text-gray-500">
                        Tidak ada data dosen.
                    </td>
                </tr>
                @endforelse

                @forelse ($karyawans as $karyawan)
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap text-center font-medium">{{ $karyawan->nama_karyawan }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-center">Karyawan</td>
                    <td class="px-4 py-3 whitespace-nowrap text-center">{{ $karyawan->no_hp }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-4 py-4 text-center text-sm text-gray-500">
                        Tidak ada data karyawan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection