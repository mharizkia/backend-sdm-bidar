@extends('layouts.admin')

@section('title', 'Validasi Cuti')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Validasi Cuti</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-[#1D3F8E] text-white p-4">
            <h2 class="text-xl font-semibold">Tabel Validasi Cuti</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Nama</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Tipe</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Jenis Cuti</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Mulai</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Hingga</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-700">
                    @forelse ($cutis as $cuti)
                    <tr>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $cuti->nama }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ ucfirst($cuti->tipe) }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $cuti->jenis_cuti }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $cuti->terhitung_mulai }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $cuti->terhitung_hingga }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">
                            @if($cuti->status == 'pending')
                                <span class="bg-yellow-500 text-white px-2 py-1 rounded text-xs">Pending</span>
                            @elseif($cuti->status == 'terima')
                                <span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Terima</span>
                            @else
                                <span class="bg-red-500 text-white px-2 py-1 rounded text-xs">Tolak</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">
                            @if($cuti->status == 'pending')
                            <div class="flex flex-col space-y-1">
                                <form action="{{ route('cuti.validate', $cuti->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="terima">
                                    <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded text-xs">Terima</button>
                                </form>
                                <form action="{{ route('cuti.validate', $cuti->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="tolak">
                                    <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-xs">Tolak</button>
                                </form>
                            </div>
                            @else
                                <span class="text-gray-400 text-xs">Sudah divalidasi</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-4 text-center text-sm text-gray-500">
                            Tidak ada data cuti.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection