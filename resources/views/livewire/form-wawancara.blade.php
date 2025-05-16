
<div>
    <div>
        <label>Kode Pelamar:</label>
        <input type="text" wire:model.defer="kode" class="border p-1 rounded">
        <button wire:click="cariPelamar" class="ml-2 px-3 py-1 bg-blue-600 text-white rounded">Cari</button>
    </div>

    @if (session()->has('not_found'))
        <div class="mt-2 text-red-600">{{ session('not_found') }}</div>
    @endif

    <div class="mt-2 p-2 border rounded">
        <p><strong>Nama:</strong> {{ $pelamar->nama_pelamar ?? '-' }}</p>
        <p><strong>Jenis:</strong> {{ $pelamar->pilihan_lamaran ?? '-' }}</p>
    </div>

    <div class="mt-4">
        <label>Pilih Pewawancara:</label>
        <select wire:model="pewawancara_id" class="border p-1 rounded">
            <option value="">-- Pilih --</option>
            @foreach ($daftarPewawancara as $p)
                <option value="{{ $p->id }}">{{ $p->jabatan_pewawancara }}</option>
            @endforeach
        </select>

        @if ($pewawancara_id)
            <button wire:click="tampilkanPanduan" class="ml-2 px-3 py-1 bg-purple-600 text-white rounded">
                Tampilkan Panduan
            </button>
        @endif
    </div>

    @if ($showPanduan && $pewawancara_id)
        @php
            $pew = $daftarPewawancara->firstWhere('id', $pewawancara_id);
        @endphp

        @if ($pew && $pew->dokumen_pewawancara)
            <div class="mt-2">
                <iframe src="{{ asset('storage/' . $pew->dokumen_pewawancara) }}" width="100%" height="400px" class="border"></iframe>
                <a href="{{ asset('storage/' . $pew->dokumen_pewawancara) }}" download class="text-blue-500 underline block mt-2">
                    Download Panduan Pewawancara
                </a>
            </div>
        @endif
    @endif

    <div class="mt-4">
        <label>Nama Pewawancara:</label>
        <input type="text" wire:model.defer="nama_pewawancara" class="w-full border p-1 rounded">
    </div>

    <div class="mt-4">
        <label>Tanggal Wawancara:</label>
        <input type="date" wire:model.defer="tanggal_wawancara" class="w-full border p-1 rounded">
    </div>

    <div class="mt-4">
        <label>Kesimpulan:</label>
        <textarea wire:model.defer="kesimpulan" rows="4" class="w-full border p-1 rounded"></textarea>
    </div>

    <div class="mt-4">
        <label>Upload Hasil Wawancara (PDF):</label>
        <input type="file" wire:model="poin_poin_wawancara" accept="application/pdf" class="mt-1">
    </div>

    <div class="mt-2">
        <label for="status">Status</label>
        <select wire:model.defer="status" class="border p-1 rounded">
            <option value="">-- Pilih --</option>
            <option value="lulus">Lulus</option>
            <option value="tidak_lulus">Tidak Lulus</option>
        </select>
    </div>

    @if ($previewPath)
        <div class="mt-2">
            <p><strong>Preview Hasil Wawancara:</strong></p>
            <iframe src="{{ $previewPath }}" width="100%" height="400px" class="border"></iframe>
        </div>
    @endif

    <button wire:click="simpan" class="mt-4 px-4 py-2 bg-green-600 text-white rounded">Simpan</button>

    @if (session()->has('success'))
        <div class="mt-4 text-green-600">{{ session('success') }}</div>
    @endif
</div>
