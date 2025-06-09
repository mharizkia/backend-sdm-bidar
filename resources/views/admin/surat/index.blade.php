@extends('layouts.admin')

@section('title', 'Daftar Surat Tugas')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Daftar Surat Tugas</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        {{-- Card Header --}}
        <div class="bg-[#1D3F8E] text-white p-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold">Tabel Surat Tugas</h2>
        </div>

        {{-- Filter Bar --}}
        <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-3 w-full sm:w-auto">
                <div class="w-full sm:w-auto">
                    <input type="text" placeholder="Cari...." class="form-input w-full sm:w-60 rounded-md border-gray-300 shadow-sm text-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2">
                </div>
                <div class="relative w-full sm:w-auto">
                    <button type="button" id="filterSuratTugasButton" class="w-full sm:w-auto bg-white hover:bg-gray-50 text-gray-700 font-medium py-2 px-4 border border-gray-300 rounded-md shadow-sm inline-flex items-center justify-center text-sm h-full">
                        <span>Filter</span>
                        <i class="fas fa-chevron-down ml-2 text-xs"></i>
                    </button>
                    <div id="filterSuratTugasMenu" class="origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-50" role="menu" aria-orientation="vertical" aria-labelledby="filterSuratTugasButton">
                        <div class="py-1" role="none">
                            <a href="#" data-filter-value="semua" class="filter-item-st text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Semua</a>
                            <a href="#" data-filter-value="aktif" class="filter-item-st text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Aktif</a>
                            <a href="#" data-filter-value="kadaluarsa" class="filter-item-st text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Kadaluarsa</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-auto">
                <a href="{{ route('surat-tugas.create') }}" class="w-full sm:w-auto bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-xs">
                    <i class="fas fa-plus mr-2"></i> Tambah Surat Tugas
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">No</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">Nama Pegawai</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">No. SK</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">Tanggal SK</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider min-w-[200px]">Keterangan</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">Tenggat Waktu</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-800 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-700">
                    @forelse ($suratTugas as $surat)
                    <tr>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 whitespace-nowrap font-medium">{{ $surat->user->name ?? '-' }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $surat->no_sk }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $surat->tanggal_sk }}</td>
                        <td class="px-4 py-3">{{ $surat->keterangan }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $surat->tenggat_waktu ?? '-' }}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-center">
                            <div class="inline-flex items-center space-x-2">
                                <a href="{{ route('surat-tugas.edit', $surat->id) }}" 
                                   class="text-blue-600 hover:text-blue-800 transition-colors duration-150 text-lg" 
                                   title="Edit Surat Tugas">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('surat-tugas.destroy', $surat->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat tugas ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-800 transition-colors duration-150 text-lg" 
                                            title="Hapus Surat Tugas">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-4 text-center text-sm text-gray-500">
                            Tidak ada data surat tugas.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
            <span class="text-xs text-gray-700">
                Menampilkan {{ $suratTugas->count() > 0 ? '1 sampai ' . $suratTugas->count() : '0' }} dari {{ $suratTugas->count() }} entri
            </span>
            {{-- Pagination jika ada --}}
            @if(method_exists($suratTugas, 'links'))
                {{ $suratTugas->links() }}
            @endif
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const filterButton = document.getElementById('filterSuratTugasButton');
    const filterMenu = document.getElementById('filterSuratTugasMenu');

    if (filterButton && filterMenu) {
        filterButton.addEventListener('click', function (event) {
            event.stopPropagation();
            filterMenu.classList.toggle('hidden');
        });

        filterMenu.querySelectorAll('.filter-item-st').forEach(item => {
            item.addEventListener('click', function(event) {
                event.preventDefault();
                const filterValue = this.dataset.filterValue;
                console.log('Filter Surat Tugas dipilih:', filterValue);
                filterMenu.classList.add('hidden');
            });
        });
        window.addEventListener('click', function (event) {
            if (filterMenu && !filterMenu.classList.contains('hidden') && !filterButton.contains(event.target) && !filterMenu.contains(event.target)) {
                filterMenu.classList.add('hidden');
            }
        });
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && filterMenu && !filterMenu.classList.contains('hidden')) {
                filterMenu.classList.add('hidden');
            }
        });
    }
});
</script>
@endpush