<div class="p-4">
    <h2 class="text-xl font-semibold mb-4">Data Wawancara</h2>

    <table class="w-full table-auto border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Kode Pelamar</th>
                <th class="border px-4 py-2">Nama Pelamar</th>
                <th class="border px-4 py-2">Jenis Lamaran</th>
                <th class="border px-4 py-2">Tanggal Psikologi</th>
                <th class="border px-4 py-2">Kesimpulan</th>
                <th class="border px-4 py-2">Hasil Psikologi</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($listPsikologi as $index => $w)
                <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $w->pelamar->kode ?? '-' }}</td>
                    <td class="border px-4 py-2">{{ $w->pelamar->nama_pelamar ?? '-' }}</td>
                    <td class="border px-4 py-2">{{ $w->pelamar->pilihan_lamaran ?? '-' }}</td>
                    <td class="border px-4 py-2">{{ $w->tanggal_psikologis }}</td>
                    <td class="border px-4 py-2">{{ $w->kesimpulan }}</td>
                    <td class="border px-4 py-2 text-center">
                        @if ($w->hasil_psikologis)
                            <a href="{{ asset('storage/' . $w->hasil_psikologis) }}" target="_blank" class="text-blue-600 underline">
                                Lihat PDF
                            </a>
                        @else
                            <span class="text-gray-500">Belum diupload</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('psikologi.edit', $w->id) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center py-4 text-gray-600">Belum ada data wawancara.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
