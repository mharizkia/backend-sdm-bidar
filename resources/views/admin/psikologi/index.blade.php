{{-- filepath: resources/views/admin/psikologi/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-10">
    <h2 class="text-2xl font-bold mb-6">Daftar Hasil Psikologi</h2>

    @if(session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    <a href="{{ route('psikologi.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Psikologi</a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama Pelamar</th>
                    <th class="px-4 py-2 border">Tanggal Psikologis</th>
                    <th class="px-4 py-2 border">Kesimpulan</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">File Hasil</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($psikologis as $no => $psikologi)
                <tr>
                    <td class="px-4 py-2 border text-center">{{ $no + 1 }}</td>
                    <td class="px-4 py-2 border">{{ $psikologi->pelamar->nama_pelamar ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $psikologi->tanggal_psikologis }}</td>
                    <td class="px-4 py-2 border">{{ $psikologi->kesimpulan }}</td>
                    <td class="px-4 py-2 border capitalize">{{ $psikologi->status }}</td>
                    <td class="px-4 py-2 border">
                        @if($psikologi->hasil_psikologis)
                            <a href="{{ asset('storage/'.$psikologi->hasil_psikologis) }}" target="_blank" class="text-blue-600 underline">Lihat PDF</a>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('psikologi.edit', $psikologi->id) }}" class="text-blue-600 underline">Edit</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4 text-gray-500">Belum ada data psikologi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection