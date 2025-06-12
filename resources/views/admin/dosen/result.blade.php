<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
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
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Nomor HP</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Bidang Ilmu Kompetensi</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Status Aktivasi</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Dokumen Karyawan</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-600">
            @forelse ($dosens ?? [] as $dosen)
            <tr>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->kode_dosen }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap font-medium text-gray-900">{{ $dosen->nama_dosen }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->nidn }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->tempat_lahir }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->tanggal_lahir }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($dosen->jenis_kelamin == 'L')
                        Laki-laki
                    @elseif($dosen->jenis_kelamin == 'P')
                        Perempuan
                    @else
                        -
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->email }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->alamat }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->pendidikan_tertinggi }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->umur }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->no_hp }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->bidang_ilmu_kompetensi }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($dosen->status_aktivasi == 'aktif')
                        <span class="text-green-600 font-semibold">Aktif</span>
                    @else
                        <span class="text-red-600 font-semibold">Tidak Aktif</span>
                    @endif
                </td>
                 <td class="px-3 py-3 text-center whitespace-nowrap"></td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    <div class="inline-flex items-center space-x-2">
                        <a href="{{ route('dosen.edit', $dosen->id) }}" class="text-blue-600 hover:text-blue-800 transition-colors duration-150 text-lg" title="Edit Data Dosen">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data dosen ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 transition-colors duration-150 text-lg" title="Hapus Data Dosen">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="14" class="text-center py-4">Tidak ada data dosen.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>