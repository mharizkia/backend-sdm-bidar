<div class="p-4">
    <h2 class="text-lg font-bold mb-4">Data Dosen</h2>

    @if (session()->has('message'))
        <div class="text-green-600 mb-2">{{ session('message') }}</div>
    @endif

    <table class="w-full border mb-4">
        <thead>
            <tr>
                <th class="border px-2">Nama</th>
                <th class="border px-2">Email</th>
                <th class="border px-2">No HP</th>
                <th class="border px-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dosens as $dosen)
                <tr>
                    <td class="border px-2">{{ $dosen->nama_dosen }}</td>
                    <td class="border px-2">{{ $dosen->email }}</td>
                    <td class="border px-2">{{ $dosen->no_hp }}</td>
                    <td class="border px-2">
                        <button wire:click="edit({{ $dosen->id }})" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($editId)
        <div class="border p-4 rounded bg-gray-100">
            <h3 class="font-semibold text-lg mb-2">Edit Dosen</h3>

            <div class="mb-2">
                <label>Nama Dosen</label>
                <input type="text" wire:model.defer="nama_dosen" class="w-full border rounded p-1">
            </div>
            <div class="mb-2">
                <label>NIP</label>
                <input type="text" wire:model.defer="nip" class="w-full border rounded p-1">
            </div>
            <div class="mb-2">
                <label>NIDN</label>
                <input type="text" wire:model.defer="nidn" class="w-full border rounded p-1">
            </div>
            <div class="mb-2">
                <label>Email</label>
                <input type="email" wire:model.defer="email" class="w-full border rounded p-1">
            </div>
            <div class="mb-2">
                <label>No HP</label>
                <input type="text" wire:model.defer="no_hp" class="w-full border rounded p-1">
            </div>

            <div class="flex gap-2">
                <button wire:click="update" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
                <button wire:click="cancel" class="bg-gray-400 text-white px-4 py-2 rounded">Batal</button>
            </div>
        </div>
    @endif
</div>
