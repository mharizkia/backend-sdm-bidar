@extends('layouts.admin')

@section('title', 'Arsip Pelamar')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Arsip Data Pelamar</h1>
    </div>
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-[#1D3F8E] text-white p-4">
            <h2 class="text-xl font-semibold">Tabel Arsip Pelamar</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">ID</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Nama</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Pilihan Lamaran</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tanggal Lamaran</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-600">
                    @forelse ($pelamars as $pelamar)
                    <tr>
                        <td class="px-3 py-3 text-center">{{ $pelamar->kode }}</td>
                        <td class="px-3 py-3 text-center">{{ $pelamar->nama_pelamar }}</td>
                        <td class="px-3 py-3 text-center">{{ $pelamar->email }}</td>
                        <td class="px-3 py-3 text-center">
                            @if($pelamar->pilihan_lamaran == 'dosen')
                                Dosen
                            @elseif($pelamar->pilihan_lamaran == 'karyawan')
                                Karyawan
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-3 py-3 text-center">{{ $pelamar->tanggal_lamaran }}</td>
                        <td class="px-3 py-3 text-center">
                            {{-- Tambahkan aksi jika perlu, misal restore --}}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">Tidak ada data arsip pelamar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection