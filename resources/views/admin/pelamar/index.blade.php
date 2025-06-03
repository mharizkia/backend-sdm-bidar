@extends('layouts.app') <!-- sesuaikan dengan layoutmu -->

@section('content')
<div class="p-4">
    <h2 class="text-xl font-semibold mb-4">Data Pelamar</h2>

    @if(session('message'))
        <div class="mb-4 text-green-600">{{ session('message') }}</div>
    @endif

    <table class="w-full table-auto border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Kode Pelamar</th>
                <th class="border px-4 py-2">Nama Pelamar</th>
                <th class="border px-4 py-2">Jenis Lamaran</th>
                <th class="border px-4 py-2">Hasil Psikologi</th>
                <th class="border px-4 py-2">Hasil Wawancara</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pelamars as $index => $w)
                <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $w->kode ?? '-' }}</td>
                    <td class="border px-4 py-2">{{ $w->nama_pelamar ?? '-' }}</td>
                    <td class="border px-4 py-2">{{ $w->pilihan_lamaran ?? '-' }}</td>
                    <td class="border px-4 py-2 text-center">
                        @if ($w->psikologi && $w->psikologi->hasil_psikologis)
                            <a href="{{ asset('storage/' . $w->psikologi->hasil_psikologis) }}" target="_blank" class="text-blue-600 underline">
                                Lihat PDF
                            </a>
                        @else
                            <span class="text-gray-500">Belum diupload</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2 text-center">
                        @if ($w->wawancara && $w->wawancara->hasil_wawancara)
                            <a href="{{ asset('storage/' . $w->wawancara->hasil_wawancara) }}" target="_blank" class="text-blue-600 underline">
                                Lihat PDF
                            </a>
                        @else
                            <span class="text-gray-500">Belum diupload</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 border">
                        <form action="{{ route('pelamar.konfirmasi', $w->id) }}" method="POST" class="inline-block">
                            @csrf
                            <select name="status" class="border rounded px-2 py-1">
                                <option value="">Pilih Status</option>
                                <option value="terima" {{ $w->status == 'terima' ? 'selected' : ''}}>Diterima</option>
                                <option value="tolak" {{ $w->status == 'tolak' ? 'selected' : ''}}>Ditolak</option>
                            </select>
                    </td>
                    <td class="px-4 py-2 border text-center">
                            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                Konfirmasi
                            </button>
                        </form>
                        <a href="{{ route('pelamar.edit', $w->id) }}" class="inline-block bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 ml-1">Edit</a>
                        <form action="{{ route('pelamar.destroy', $w->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-1">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center py-4 text-gray-600">Belum ada data wawancara.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
