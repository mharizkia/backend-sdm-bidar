<div>
    <div>
        <label>Kode Pelamar:</label>
        <input type="text" wire:model.debounce.500ms="kode">
    </div>

    @if ($pelamar)
        <div class="mt-2 p-2 border">
            <p><strong>Nama:</strong> {{ $pelamar->nama_pelamar }}</p>
            <p><strong>Pilihan Lamaran:</strong> {{ $pelamar->pilihan_lamaran }}</p>
            <p><strong>Tanggal Lamaran:</strong> {{ $pelamar->tanggal_lamaran }}</p>
            <p><strong>Jenis Kelamin: {{ $pelamar->jenis_kelamin }}</strong></p>
            <p><strong>Tempat Lahir:</strong> {{ $pelamar->tempat_lahir }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ $pelamar->tanggal_lahir }}</p>
            <p><strong>Alamat:</strong> {{ $pelamar->alamat }}</p>
            <p><strong>Bidang ilmu/Kompetensi:</strong> {{ $pelamar->bidang_ilmu_kompetensi }}</p>
        </div>

        <div class="mt-4">
            <label>Pilih Jabatam Pewawancara:</label>
            <select wire:model="pewawancara_id">
                <option value="">-- Pilih --</option>
                @foreach ($daftarPewawancara as $p)
                    <option value="{{ $p->id }}">{{ $p->jabatan_pewawancara }}</option>
                @endforeach
            </select>
        </div>

        @if ($pewawancara_id)
            @php
                $dokumen = $daftarPewawancara->find($pewawancara_id)?->dokumen_pewawancara;
            @endphp

            @if ($dokumen)
                <div class="mt-2">
                    <iframe src="{{ asset('storage/' . $dokumen) }}" width="100%" height="400px"></iframe>
                    <a href="{{ asset('storage/' . $dokumen) }}" download class="text-blue-500 underline">Download Panduan Pewawancara</a>
                </div>
            @endif
        @endif

        <div class="mt-4">
            <label>Upload Hasil Wawancara (PDF):</label>
            <input type="file" wire:model="poin_poin_wawancara" accept="application/pdf">
        </div>

        @if ($previewPath)
            <div class="mt-2">
                <p><strong>Preview Hasil Wawancara:</strong></p>
                <iframe src="{{ $previewPath }}" width="100%" height="400px"></iframe>
            </div>
        @endif

        <button wire:click="simpan" class="mt-4 px-4 py-2 bg-green-600 text-white rounded">Simpan</button>
    @endif

    @if (session()->has('success'))
        <div class="mt-4 text-green-600">{{ session('success') }}</div>
    @endif
</div>
