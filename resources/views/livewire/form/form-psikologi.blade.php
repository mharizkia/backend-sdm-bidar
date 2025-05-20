<div>
    <div>
        <label>Kode Pelamar:</label>
        <input type="text" wire:model.defer="kode" class="border p-1 rounded">
        <button wire:click="cariPelamar" class="ml-2 px-3 py-1 bg-blue-600 text-white rounded">Cari</button>
    </div>

    @if (session()->has('not_found'))
        <div class="text-red-600 mt-2">{{ session('not_found') }}</div>
    @endif

    @if ($pelamar)
        <div class="mt-2 p-2 border rounded">
            <p><strong>Nama:</strong> {{ $pelamar->nama_pelamar }}</p>
            <p><strong>Jenis:</strong> {{ $pelamar->pilihan_lamaran }}</p>
        </div>

        <div class="mt-4">
            <label>Tanggal Psikologis:</label>
            <input type="date" wire:model.defer="tanggal_psikologis" class="w-full border p-1 rounded" required>
        </div>

        <div class="mt-4">
            <p><strong>Poin Psikologis:</strong></p>
            <iframe src="{{ asset('storage/' . $poin_poin_psikologis_path) }}" width="100%" height="400px" class="border"></iframe>
        </div>

        <div class="mt-4">
            <label>Upload Hasil Psikologis (PDF):</label>
            <input type="file" wire:model="hasil_psikologis" accept="application/pdf" class="mt-1">
        </div>

        @if ($previewPath)
            <div class="mt-2">
                <a href="{{ $previewPath }}" target="_blank" class="text-blue-600 underline">
                    Lihat PDF Hasil Psikologi
                </a>
            </div>
        @endif

        <div class="mt-4">
            <label>Kesimpulan:</label>
            <textarea wire:model.defer="kesimpulan" rows="3" class="w-full border p-1 rounded"></textarea>
        </div>

        <div class="mt-4">
            <label>Status:</label>
            <select wire:model.defer="status" class="w-full border p-1 rounded">
                <option value="">-- Pilih Status --</option>
                <option value="lulus">Lulus</option>
                <option value="tidak_lulus">Tidak Lulus</option>
            </select>
        </div>

        <button wire:click="simpan" class="mt-4 px-4 py-2 bg-green-600 text-white rounded">Simpan</button>
    @endif

    @if (session()->has('success'))
        <div class="mt-4 text-green-600">{{ session('success') }}</div>
    @endif
</div>
