@extends('layouts.admin')

@section('title', 'Data Wawancara Pelamar')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Data Wawancara</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-[#1D3F8E] text-white p-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold">Tabel Data Wawancara</h2>
            <a href="{{ route('pelamar.index') }}" class="text-sm bg-white text-[#1D3F8E] hover:bg-gray-100 font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Validasi
            </a>
        </div>

        <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-3 w-full sm:w-auto">
                <div class="w-full sm:w-auto">
                    <input type="text" placeholder="Cari...." class="form-input w-full sm:w-60 rounded-md border-gray-300 shadow-sm text-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2">
                </div>
                <div class="relative w-full sm:w-auto">
                    <button type="button" id="filterWawancaraButton" class="w-full sm:w-auto bg-white hover:bg-gray-50 text-gray-700 font-medium py-2 px-4 border border-gray-300 rounded-md shadow-sm inline-flex items-center justify-center text-sm h-full">
                        <span>Filter</span>
                        <i class="fas fa-chevron-down ml-2 text-xs"></i>
                    </button>
                    <div id="filterWawancaraMenu" class="origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-50" role="menu" aria-orientation="vertical" aria-labelledby="filterWawancaraButton">
                        <div class="py-1" role="none">
                            <a href="#" data-filter-value="semua" class="filter-item-wawancara text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Semua</a>
                            <a href="#" data-filter-value="lulus" class="filter-item-wawancara text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Lulus</a>
                            <a href="#" data-filter-value="pending" class="filter-item-wawancara text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Pending</a>
                            <a href="#" data-filter-value="tidak_lulus" class="filter-item-wawancara text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Tidak Lulus</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-auto">
                <a href="{{ route('wawancara.create') }}" class="w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                    <i class="fas fa-plus mr-2"></i> Input Data Wawancara
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">Kode Pelamar</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">Nama Pelamar</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">Nama Pewawancara</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">Tanggal</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-800 uppercase tracking-wider">Dokumen</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider min-w-[200px]">Kesimpulan</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-800 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-700">
                    @forelse ($wawancaras as $wawancara)
                    <tr>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $wawancara->pelamar->kode ?? '-' }}</td>
                        <td class="px-4 py-3 whitespace-nowrap font-medium">{{ $wawancara->pelamar->nama_pelamar ?? '-' }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $wawancara->nama_pewawancara }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $wawancara->tanggal_wawancara }}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-center">
                            @if($wawancara->hasil_wawancara)
                                <a href="{{ asset('storage/' . $wawancara->hasil_wawancara) }}" target="_blank" class="text-blue-600 hover:text-blue-800" title="Lihat Dokumen Wawancara">
                                    <i class="fas fa-file-alt text-lg"></i>
                                </a>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 ">{{ Str::limit($wawancara->kesimpulan, 70) }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            @if($wawancara->status == 'lulus')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Lulus
                                </span>
                            @elseif($wawancara->status == 'pending')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Tidak Lulus
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-center">
                            <div class="inline-flex items-center space-x-2">
                                <a href="{{ route('wawancara.edit', ['id' => $wawancara->id]) }}" 
                                   class="text-blue-600 hover:text-blue-800 transition-colors duration-150 text-lg" 
                                   title="Edit Data Wawancara">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('wawancara.destroy', ['id' => $wawancara->id]) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data wawancara ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-800 transition-colors duration-150 text-lg" 
                                            title="Hapus Data Wawancara">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-4 text-center text-sm text-gray-500">
                            Tidak ada data wawancara yang ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
            <span class="text-xs text-gray-700">
                Menampilkan {{ $wawancaras->count() > 0 ? '1 sampai ' . $wawancaras->count() : '0' }} dari {{ $wawancaras->count() }} entri
            </span>
            <div class="inline-flex -space-x-px rounded-md shadow-sm">
                <button class="py-1 px-2 sm:py-2 sm:px-3 leading-tight text-xs text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 rounded-l-lg">Sebelumnya</button>
                <button class="py-1 px-2 sm:py-2 sm:px-3 leading-tight text-xs text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700">1</button>
                <button class="py-1 px-2 sm:py-2 sm:px-3 leading-tight text-xs text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 rounded-r-lg">Berikutnya</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const filterButton = document.getElementById('filterWawancaraButton');
    const filterMenu = document.getElementById('filterWawancaraMenu'); 

    if (filterButton && filterMenu) {
        filterButton.addEventListener('click', function (event) {
            event.stopPropagation();
            filterMenu.classList.toggle('hidden');
        });

        filterMenu.querySelectorAll('.filter-item-wawancara').forEach(item => { 
            item.addEventListener('click', function(event) {
                event.preventDefault();
                const filterValue = this.dataset.filterValue;
                // Implementasi filter bisa ditambahkan di sini
                filterMenu.classList.add('hidden');
            });
        });
    }

    window.addEventListener('click', function (event) {
        if (filterMenu && !filterMenu.classList.contains('hidden') && filterButton && !filterButton.contains(event.target) && !filterMenu.contains(event.target)) {
            filterMenu.classList.add('hidden');
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            if (filterMenu && !filterMenu.classList.contains('hidden')) {
                filterMenu.classList.add('hidden');
            }
        }
    });
});
</script>
@endpush