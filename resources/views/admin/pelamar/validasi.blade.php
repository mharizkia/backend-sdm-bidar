@extends('layouts.admin')

@section('title', 'Data Validasi Pelamar')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Data Validasi</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-[#1D3F8E] text-white p-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold">Tabel Data Validasi</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Kode</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Nama</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">NIDN</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tempat Lahir</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tanggal Lahir</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Jenis Kelamin</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Alamat</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Pendidikan Tertinggi</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Umur</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">IPK</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Bidang Ilmu Kompetensi</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">No HP</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Pilihan Lamaran</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tanggal Lamaran</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Wawancara</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Psikologi</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-600">
                    @forelse ($pelamars as $pelamar)
                    <tr>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->kode }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap font-medium text-gray-900">{{ $pelamar->nama_pelamar }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->nidn }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->tempat_lahir }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->tanggal_lahir }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">
                            {{ $pelamar->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->email }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->alamat }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->pendidikan_tertinggi }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->umur }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->ipk }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->bidang_ilmu_kompetensi }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->no_hp }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ ucfirst($pelamar->pilihan_lamaran) }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->tanggal_lamaran }}</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">
                            @if($pelamar->wawancara)
                                <a href="{{ route('wawancara.show', $pelamar->wawancara->id) }}" class="text-blue-600 text-lg hover:text-blue-800 transition-colors duration-150" title="Lihat Data Wawancara Pelamar">
                                    <i class="fas fa-eye"></i>
                                </a>
                            @else
                                <a href="{{ route('wawancara.create', ['kode' => $pelamar->kode]) }}" class="text-blue-600 text-lg hover:text-blue-800 transition-colors duration-150" title="Input Data Wawancara Pelamar">
                                    <i class="fas fa-plus"></i>
                                </a>
                            @endif
                        </td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">
                            @if($pelamar->psikologi)
                                <a href="{{ route('psikologi.show', $pelamar->psikologi->id) }}" class="text-blue-600 text-lg hover:text-blue-800 transition-colors duration-150" title="Lihat Data Tes Psikologi Pelamar">
                                    <i class="fas fa-eye"></i>
                                </a>
                            @else
                                <a href="{{ route('psikologi.create', ['kode' => $pelamar->kode]) }}" class="text-blue-600 text-lg hover:text-blue-800 transition-colors duration-150" title="Input Data Tes Psikologi Pelamar">
                                    <i class="fas fa-plus"></i>
                                </a>
                            @endif
                        </td>
                        <td class="px-3 py-3 text-sm whitespace-nowrap">
                            <div class="relative inline-block text-left status-dropdown-container w-full min-w-[100px]">
                                <form action="{{ route('pelamar.konfirmasi', $pelamar->id) }}" method="POST" class="status-form">
                                    @csrf
                                    <input type="hidden" name="status" value="{{ $pelamar->status }}">
                                    <button type="button" class="status-dropdown-button inline-flex justify-between items-center w-full rounded-md border shadow-sm px-3 py-1 text-xs font-medium text-white focus:outline-none
                                        {{ $pelamar->status == 'terima' ? 'bg-green-500 hover:bg-green-600 border-green-500' : ($pelamar->status == 'tolak' ? 'bg-red-500 hover:bg-red-600 border-red-500' : 'bg-yellow-500 hover:bg-yellow-600 border-yellow-500') }}">
                                        <span class="status-text">
                                            @if($pelamar->status == 'terima')
                                                Terima
                                            @elseif($pelamar->status == 'tolak')
                                                Tolak
                                            @else
                                                Pending
                                            @endif
                                        </span>
                                        <i class="fas fa-chevron-down -mr-1 ml-1 h-4 w-4"></i>
                                    </button>
                                    <div class="status-dropdown-menu origin-top-right absolute right-0 mt-2 w-full rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-10">
                                        <div class="py-1" role="none">
                                            <a href="#" data-status="terima" class="status-item block px-4 py-2 text-xs text-gray-700 hover:bg-gray-100">Terima</a>
                                            <a href="#" data-status="tolak" class="status-item block px-4 py-2 text-xs text-gray-700 hover:bg-gray-100">Tolak</a>
                                            <a href="#" data-status="pending" class="status-item block px-4 py-2 text-xs text-gray-700 hover:bg-gray-100">Pending</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">
                            <div class="inline-flex items-center space-x-2">
                                <a href="{{ route('pelamar.edit', ['id' => $pelamar->id]) }}" class="text-blue-600 hover:text-blue-800 transition-colors duration-150 text-lg" title="Edit Data Pelamar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('pelamar.destroy', ['id' => $pelamar->id]) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pelamar ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 transition-colors duration-150 text-lg" title="Hapus Data Pelamar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="17" class="px-3 py-4 text-center text-sm text-gray-500">
                            Tidak ada data pelamar untuk divalidasi.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
            <span class="text-sm text-gray-700">
                Menampilkan {{ $pelamars->count() > 0 ? '1 sampai ' . $pelamars->count() : '0' }} dari {{ $pelamars->count() }} entri
            </span>
            <div class="inline-flex -space-x-px rounded-md shadow-sm">
                <button class="py-1 px-2 sm:py-2 sm:px-3 leading-tight text-sm text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 rounded-l-lg">Sebelumnya</button>
                <button class="py-1 px-2 sm:py-2 sm:px-3 leading-tight text-sm text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700">1</button>
                <button class="py-1 px-2 sm:py-2 sm:px-3 leading-tight text-sm text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 rounded-r-lg">Berikutnya</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const statusDropdownContainers = document.querySelectorAll('.status-dropdown-container');
    statusDropdownContainers.forEach(container => {
        const button = container.querySelector('.status-dropdown-button');
        const menu = container.querySelector('.status-dropdown-menu');
        const statusTextSpan = container.querySelector('.status-text');
        const form = container.querySelector('.status-form');
        const statusInput = form.querySelector('input[name="status"]');

        if (button && menu) {
            button.addEventListener('click', function(event) {
                event.stopPropagation();
                document.querySelectorAll('.status-dropdown-menu').forEach(m => {
                    if (m !== menu) m.classList.add('hidden');
                });
                menu.classList.toggle('hidden');
            });

            menu.querySelectorAll('.status-item').forEach(item => {
                item.addEventListener('click', function(event) {
                    event.preventDefault();
                    const newStatus = this.dataset.status;
                    const newText = this.textContent;

                    if (statusTextSpan) {
                        statusTextSpan.textContent = newText;
                    }
                    if (statusInput) {
                        statusInput.value = newStatus;
                    }

                    let newClasses = 'inline-flex justify-between items-center w-full rounded-md border shadow-sm px-3 py-1 text-xs font-medium text-white focus:outline-none ';
                    if (newStatus === 'terima') {
                        newClasses += 'bg-green-500 hover:bg-green-600 border-green-500';
                    } else if (newStatus === 'tolak') {
                        newClasses += 'bg-red-500 hover:bg-red-600 border-red-500';
                    } else {
                        newClasses += 'bg-yellow-500 hover:bg-yellow-600 border-yellow-500';
                    }
                    button.className = newClasses;

                    menu.classList.add('hidden');
                    form.submit();
                });
            });
        }
    });

    window.addEventListener('click', function (event) {
        document.querySelectorAll('.status-dropdown-menu').forEach(menu => {
            const container = menu.closest('.status-dropdown-container');
            const button = container ? container.querySelector('.status-dropdown-button') : null;
            if (!menu.classList.contains('hidden') && button && !button.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            document.querySelectorAll('.status-dropdown-menu').forEach(menu => {
                if (!menu.classList.contains('hidden')) {
                    menu.classList.add('hidden');
                }
            });
        }
    });
});
</script>
@endpush