<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Kode</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Nama</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">NIK</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tempat Lahir</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tanggal Lahir</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Jenis Kelamin</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Alamat</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Pendidikan Tertinggi</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Umur</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Nomor HP</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Jabatan</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Status Aktivasi</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-600">
            @forelse ($karyawans ?? [] as $karyawan)
            <tr>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $karyawan->kode_karyawan }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap font-medium text-gray-900">{{ $karyawan->nama_karyawan }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $karyawan->nik_ktp }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $karyawan->tempat_lahir }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $karyawan->tanggal_lahir }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->jenis_kelamin == 'L')
                        Laki-laki
                    @elseif($karyawan->jenis_kelamin == 'P')
                        Perempuan
                    @else
                        -
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $karyawan->email }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $karyawan->alamat }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $karyawan->pendidikan_tertinggi }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $karyawan->umur }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $karyawan->no_hp }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $karyawan->jabatan }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->status_aktivasi == 'aktif')
                        <span class="text-green-600 font-semibold">Aktif</span>
                    @else
                        <span class="text-red-600 font-semibold">Tidak Aktif</span>
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    <div class="inline-flex items-center space-x-2">
                        <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="text-blue-600 hover:text-blue-800 transition-colors duration-150 text-lg" title="Edit Data Karyawan">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data karyawan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 transition-colors duration-150 text-lg" title="Hapus Data Karyawan">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="14" class="text-center py-4">Tidak ada data karyawan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>