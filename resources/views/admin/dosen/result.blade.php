<div class="p-4">
    <h2 class="text-lg font-bold mb-4">Data Dosen</h2>

    @if (session('message'))
        <div class="text-green-600 mb-2">{{ session('message') }}</div>
    @endif

    <table class="w-full border mb-4">
        <thead>
            <tr>
                <th class="border px-2">Nama</th>
                <th class="border px-2">NIDN</th>
                <th class="border px-2">Tempat Lahir</th>
                <th class="border px-2">Tanggal Lahir</th>
                <th class="border px-2">Jenis Kelamin</th>
                <th class="border px-2">Email</th>
                <th class="border px-2">No HP</th>
                <th class="border px-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dosens as $dosen)
                <tr>
                    <td class="border px-2">{{ $dosen->nama_dosen }}</td>
                    <td class="border px-2">{{ $dosen->nidn }}</td>
                    <td class="border px-2">{{ $dosen->tempat_lahir }}</td>
                    <td class="border px-2">{{ $dosen->tanggal_lahir }}</td>
                    <td class="border px-2">{{ $dosen->jenis_kelamin }}</td>
                    <td class="border px-2">{{ $dosen->email }}</td>
                    <td class="border px-2">{{ $dosen->no_hp }}</td>
                    <td class="border px-2">
                        <a href="{{ route('dosen.edit', $dosen->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>