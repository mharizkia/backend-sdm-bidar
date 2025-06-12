<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Kode</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Nama</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Password</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">NIK</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Umur</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Alamat</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tempat Lahir</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tanggal Lahir</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Jenis Kelamin</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Golongan Darah</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Agama</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Nomor HP</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Nomor NPWP</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Pendidikan Tertinggi</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Ikatan Kerja</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Akhir Ikatan Kerja</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Jabatan</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tanggal Mulai Kerja</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Unit Kerja</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Status Aktivasi</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Profil Karyawan</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Dokumen Karyawan</th>
                <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-600">
            @forelse ($karyawans ?? [] as $karyawan)
            <tr>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->kode_karyawan)
                        {{ $karyawan->kode_karyawan }}
                    @else
                        -
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap font-medium text-gray-900">
                    @if($karyawan->nama_karyawan)
                        {{ $karyawan->nama_karyawan }}
                    @else
                        -
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->password)
                        <span class="text-gray-500 italic">Tersembunyi</span>
                    @else
                        <span class="text-red-500 font-semibold">Belum Diatur</span>
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->email)
                        {{ $karyawan->email }}
                    @else
                        -
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->nik_ktp)
                        {{ $karyawan->nik_ktp }}
                    @else
                        -
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->umur)
                        {{ $karyawan->umur }}
                    @else
                        -
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->alamat)
                        {{ $karyawan->alamat }}
                    @else
                        -
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->tempat_lahir)
                        {{ $karyawan->tempat_lahir }}
                    @else
                        -
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->tanggal_lahir)
                        {{ $karyawan->tanggal_lahir }}
                    @else
                        -
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->jenis_kelamin == 'L')
                        Laki-laki
                    @elseif($karyawan->jenis_kelamin == 'P')
                        Perempuan
                    @else
                        -
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->golongan_darah == 'A')
                        A
                    @elseif($karyawan->golongan_darah == 'B')
                        B
                    @elseif($karyawan->golongan_darah == 'AB')
                        AB
                    @elseif($karyawan->golongan_darah == 'O')
                        O
                    @else
                        -
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->agama)
                        {{ $karyawan->agama }}
                    @else
                        -
                    @endif
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->no_hp)
                        {{ $karyawan->no_hp }}
                    @else
                        -
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->no_npwp)
                        {{ $karyawan->no_npwp }}
                    @else
                        -
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->pendidikan_tertinggi)
                        {{ $karyawan->pendidikan_tertinggi }}
                    @else
                        -
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap">{{ $karyawan->ikatan_kerja }}</td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->akhir_ikatan_kerja)
                        {{ $karyawan->akhir_ikatan_kerja }}
                    @else
                        -
                    @endif
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->jabatan)
                        {{ $karyawan->jabatan }}
                    @else
                        -
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->tanggal_mulai_kerja)
                        {{ $karyawan->tanggal_mulai_kerja }}
                    @else
                        -
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->kat_unit_kerja_id)
                        {{ $karyawan->kat_unit_kerja_id }}
                    @else
                        -
                    @endif
                </td>
                <td class="px-3 py-3 text-center whitespace-nowrap">
                    @if($karyawan->status_aktivasi == 'aktif')
                        <span class="text-green-600 font-semibold">Aktif</span>
                    @else
                        <span class="text-red-600 font-semibold">Tidak Aktif</span>
                    @endif
                </td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">
                            @if($karyawan->foto_karyawan)
                                <a href="{{ asset('storage/' . $karyawan->foto_karyawan) }}" class="text-blue-600 text-lg hover:text-blue-800 transition-colors duration-150" title="Lihat Data Wawancara Pelamar">
                                    <i class="fas fa-eye"></i>
                                </a>
                            @else
                                -
                            @endif
                        </td>  
                <td class="px-3 py-3 text-center whitespace-nowrap">
                            @if($karyawan->dokumen_karyawan)
                                <a href="{{ asset('storage/' . $karyawan->dokumen_karyawan) }}" class="text-green-600 hover:text-green-800 transition-colors duration-150 text-lg" title="Lihat Dokumen Lamaran" target="_blank">
                                    <i class="fas fa-file-alt"></i>
                                </a>
                            @else
                                -
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