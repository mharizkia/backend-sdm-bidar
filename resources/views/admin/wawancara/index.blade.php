{{-- filepath: resources/views/admin/wawancara/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-10">
    <h2 class="text-2xl font-bold mb-6">Daftar Hasil Wawancara</h2>

    @if(session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    <a href="{{ route('wawancara.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Wawancara</a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama Pelamar</th>
                    <th class="px-4 py-2 border">Nama Pewawancara</th>
                    <th class="px-4 py-2 border">Tanggal</th>
                    <th class="px-4 py-2 border">Kesimpulan</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">File</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($wawancaras as $wawancara)
                <tr>
                    <td class="px-4 py-2 border text-center">{{ $no++ }}</td>
                    <td class="px-4 py-2 border">{{ $wawancara->pelamar->nama_pelamar ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $wawancara->nama_pewawancara }}</td>
                    <td class="px-4 py-2 border">{{ $wawancara->tanggal_wawancara }}</td>
                    <td class="px-4 py-2 border">{{ $wawancara->kesimpulan }}</td>
                    <td class="px-4 py-2 border capitalize">{{ $wawancara->status }}</td>
                    <td class="px-4 py-2 border">
                        @if($wawancara->hasil_wawancara)
                            <a href="{{ asset('storage/'.$wawancara->hasil_wawancara) }}" target="_blank" class="text-blue-600 underline">Lihat PDF</a>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('wawancara.edit', $wawancara->id) }}" class="text-blue-600 underline">Edit</a>
                    </td>
                </tr>
                @endforeach
                @if(\App\Models\Wawancara::count() == 0)
                <tr>
                    <td colspan="8" class="text-center py-4 text-gray-500">Belum ada data wawancara.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection