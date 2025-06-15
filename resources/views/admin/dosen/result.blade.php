<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Kode</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Nama</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">NIDN</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">NIK</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">NIP</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Umur</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Alamat</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tempat Lahir</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tanggal Lahir</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Jenis Kelamin</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Golongan Darah</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Agama</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Nomor HP</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">No NPWP</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Falkultas</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Program Studi</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Bidang Ilmu Kompetensi</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Ikatan Kerja</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Akhir Ikatan Kerja</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tanggal Mulai Kerja</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Pendidikan Tertinggi</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Jabatan Akademik</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Golongan</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Status Aktivasi</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Foto Dosen</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Dokumen Karyawan</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-600">
            @forelse ($dosens ?? [] as $dosen)
            <tr>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->kode_dosen }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap font-medium text-gray-900">{{$dosen->gelar_depan}}{{ $dosen->nama_dosen }}, {{$dosen->gelar_belakang}}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->email }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->nidn }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->nik_ktp }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->nip }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->umur }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->alamat }}</td>
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
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->golongan_darah ?? '-' }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->agama ?? '-' }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->no_hp ?? '-' }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->no_npwp ?? '-' }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->fakultas->nama_fakultas ?? '-' }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->prodi->nama_prodi ?? '-' }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->bidang_ilmu_kompetensi }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->ikatan_kerja ?? '-' }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->akhir_ikatan_kerja ?? '-' }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->tanggal_mulai_kerja ?? '-' }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->pendidikan_tertinggi ?? '-' }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->jabatanAkademik->nama_jabatan_akademik ?? '-' }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $dosen->golongan->nama_golongan ?? '-' }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($dosen->status_aktivasi == 'aktif')
                        <span class="text-green-600 font-semibold">Aktif</span>
                    @else
                        <span class="text-red-600 font-semibold">Tidak Aktif</span>
                    @endif
                </td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">
                            @if($dosen->foto_dosen)
                                <a href="{{ asset('storage/' . $dosen->foto_dosen) }}" class="text-blue-600 text-lg hover:text-blue-800 transition-colors duration-150" title="Lihat Data Wawancara Pelamar" target="_blank">
                                    <i class="fas fa-eye"></i>
                                </a>
                            @else
                                -
                            @endif
                        </td>  
                <td class="px-3 py-3 text-center whitespace-nowrap">
                            @if($dosen->dokumen_dosen)
                                <a href="{{ asset('storage/' . $dosen->dokumen_dosen) }}" class="text-green-600 hover:text-green-800 transition-colors duration-150 text-lg" title="Lihat Dokumen Lamaran" target="_blank">
                                    <i class="fas fa-file-alt"></i>
                                </a>
                            @else
                                -
                            @endif
                        </td>
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