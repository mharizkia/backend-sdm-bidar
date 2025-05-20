    <div>
        <label>Kode Pelamar:</label>
        <form method="GET" action="{{ route('psikologi.create') }}">
            <input type="text" name="kode" value="{{ request('kode') }}" class="border p-1 rounded">
            <button type="submit" class="ml-2 px-3 py-1 bg-blue-600 text-white rounded">Cari</button>
        </form>
    </div>

    @if (session('not_found'))
        <div class="text-red-600 mt-2">{{ session('not_found') }}</div>
    @endif
    
<form action="{{ route('psikologi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if ($pelamar)
        <input type="hidden" name="pelamar_id" value="{{ $pelamar->id }}">

        <div class="mt-2 p-2 border rounded">
            <p><strong>Nama:</strong> {{ $pelamar->nama_pelamar }}</p>
            <p><strong>Jenis:</strong> {{ $pelamar->pilihan_lamaran }}</p>
        </div>

        <div class="mt-4">
            <label>Tanggal Psikologis:</label>
            <input type="date" name="tanggal_psikologis" class="w-full border p-1 rounded" required>
        </div>

        <div class="mt-4">
            <p><strong>Poin Psikologis:</strong></p>
            <iframe src="{{ asset('storage/' . $poinPsikologisPath) }}" width="100%" height="400px" class="border"></iframe>
            <a href="{{ asset('storage/' . $poinPsikologisPath) }}" download class="text-blue-600 underline block mt-2">Download Panduan Psikologis</a>
        </div>

        <div class="mt-4">
            <label>Upload Hasil Psikologis (PDF):</label>
            <input type="file" name="hasil_psikologis" accept="application/pdf" class="mt-1">
        </div>

        <div class="mt-4">
            <label>Kesimpulan:</label>
            <textarea name="kesimpulan" rows="3" class="w-full border p-1 rounded"></textarea>
        </div>

        <div class="mt-4">
            <label>Status:</label>
            <select name="status" class="w-full border p-1 rounded">
                <option value="">-- Pilih Status --</option>
                <option value="lulus">Lulus</option>
                <option value="tidak_lulus">Tidak Lulus</option>
            </select>
        </div>

        <button type="submit" class="mt-4 px-4 py-2 bg-green-600 text-white rounded">Simpan</button>
    @endif

    @if (session('success'))
        <div class="mt-4 text-green-600">{{ session('success') }}</div>
    @endif
</form>
