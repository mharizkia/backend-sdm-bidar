        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">ID</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Nama</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">NIDN</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tempat Lahir</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tanggal Lahir</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Jenis Kelamin</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Nomor HP</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Alamat</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Pendidikan Tertinggi</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Umur</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">IPK</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Bidang Ilmu Kompetensi</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Pilihan Lamaran</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tanggal Lamaran</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Dokumen</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-600">
                    @forelse ($pelamars ?? [] as $pelamar)
                    <tr>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->kode }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap font-medium text-gray-900">{{ $pelamar->nama_pelamar }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->nidn }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->tempat_lahir }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->tanggal_lahir }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">
                            @if($pelamar->jenis_kelamin == 'L')
                                Laki-laki
                            @elseif($pelamar->jenis_kelamin == 'P')
                                Perempuan
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->email }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->no_hp }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->alamat }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->pendidikan_tertinggi }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->umur }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->ipk }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->bidang_ilmu_kompetensi }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">
                            @if($pelamar->pilihan_lamaran == 'dosen')
                                Dosen
                            @elseif($pelamar->pilihan_lamaran == 'karyawan')
                                Karyawan
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->tanggal_lamaran }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">
                            @if($pelamar->dokumen_lamaran)
                                <a href="{{ asset('storage/' . $pelamar->dokumen_lamaran) }}" class="text-green-600 hover:text-green-800 transition-colors duration-150 text-lg" title="Lihat Dokumen Lamaran" target="_blank">
                                    <i class="fas fa-file-alt"></i>
                                </a>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">
                            <div class="inline-flex items-center space-x-2">
                                <a href="{{ route('pelamar.edit', $pelamar->id) }}" class="text-blue-600 hover:text-blue-800 transition-colors duration-150 text-lg" title="Edit Data Pelamar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('pelamar.destroy', $pelamar->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pelamar ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 transition-colors duration-150 text-lg" title="Hapus Data Pelamar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                <a href="{{ route('pelamar.exportIndividu', $pelamar->id) }}" class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded text-xs" title="Export">
                                    <i class="fas fa-file-excel"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="17" class="text-center py-4">Tidak ada data pelamar.</td>
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
                <button class="py-1 px-2 sm:py-3 sm:px-3 leading-tight text-sm text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 rounded-l-lg">Sebelumnya</button>
                <button class="py-1 px-2 sm:py-3 sm:px-3 leading-tight text-sm text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700">1</button>
                <button class="py-1 px-2 sm:py-3 sm:px-3 leading-tight text-sm text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</button>
                <button class="py-1 px-2 sm:py-3 sm:px-3 leading-tight text-sm text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 rounded-r-lg">Berikutnya</button>
            </div>
        </div>
    </div>