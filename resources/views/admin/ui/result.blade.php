<div class="overflow-x-auto">
    <table class="min-w-full bg-white border rounded-md shadow-sm">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-2 text-left">Nama</th>
                <th class="px-4 py-2 text-left">Kode</th>
                <th class="px-4 py-2 text-left">Email</th>
                <th class="px-4 py-2 text-left">Tipe</th>
            </tr>
        </thead>
        <tbody>
            @php
                $pegawais = collect($dosens ?? [])->map(function($d) {
                    return [
                        'nama' => $d->nama_dosen,
                        'kode' => $d->kode_dosen,
                        'email' => $d->email,
                        'tipe' => 'Dosen'
                    ];
                })->concat(
                    collect($karyawans ?? [])->map(function($k) {
                        return [
                            'nama' => $k->nama_karyawan,
                            'kode' => $k->kode_karyawan,
                            'email' => $k->email,
                            'tipe' => 'Karyawan'
                        ];
                    })
                );
            @endphp

            @forelse($pegawais as $pegawai)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">{{ $pegawai['nama'] }}</td>
                <td class="px-4 py-2">{{ $pegawai['kode'] }}</td>
                <td class="px-4 py-2">{{ $pegawai['email'] }}</td>
                <td class="px-4 py-2">{{ $pegawai['tipe'] }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-4 py-3 text-center text-gray-400">Tidak ada pegawai ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>