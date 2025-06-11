@extends('layouts.admin')

@section('title', 'Manajemen Pewawancara')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Pewawancara</h1>
        <p class="text-sm text-text-muted">Kelola daftar pewawancara untuk proses rekrutmen.</p>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-[#1D3F8E] text-white p-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold">Tabel Pewawancara</h2>
                <a href="{{ route('wawancara.index') }}" class="text-sm bg-white text-[#1D3F8E] hover:bg-gray-100 font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Wawancara
            </a>
        </div>

        <div class="p-4 border-b border-gray-200 flex justify-end">
            <a href="{{ route('pewawancara.create') }}" class="w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                <i class="fas fa-plus mr-2"></i> Tambah Pewawancara
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Jabatan</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Dokumen CV</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-700">
                    @forelse ($pewawancaras ?? [] as $index => $pewawancara)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-center">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">{{ $pewawancara->jabatan_pewawancara }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            @if(!empty($pewawancara->dokumen_pewawancara))
                            <a href="{{ asset('storage/' . $pewawancara->dokumen_pewawancara) }}" target="_blank" class="text-blue-500 underline"><i class="fas fa-file-alt text-lg"></i></a>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <div class="inline-flex items-center space-x-2">
                                <a href="{{ route('pewawancara.edit', $pewawancara->id) }}" 
                                   class="text-blue-600 hover:text-blue-800 transition-colors duration-150 text-lg" 
                                   title="Edit Pewawancara">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('pewawancara.destroy', $pewawancara->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pewawancara ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-800 transition-colors duration-150 text-lg" 
                                            title="Hapus Pewawancara">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                            Tidak ada data pewawancara. Silakan tambahkan data baru.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="p-4">
        </div>
    </div>
@endsection

