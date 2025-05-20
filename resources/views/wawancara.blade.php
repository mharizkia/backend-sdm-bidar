    <div>
        <label>Kode Pelamar:</label>
        <form method="GET" action="{{ route('wawancara.create') }}">
            <input type="text" name="kode" class="border p-1 rounded" value="{{ request('kode') }}">
            <button type="submit" class="ml-2 px-3 py-1 bg-blue-600 text-white rounded">Cari</button>
        </form>
    </div>
    @if (session('not_found'))
        <div class="text-red-600 mt-2">{{ session('not_found') }}</div>
    @endif

<form action="{{ route('wawancara.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if ($pelamar)
        <input type="hidden" name="pelamar_id" value="{{ $pelamar->id }}">

        <div class="mt-2 p-2 border rounded">
            <p><strong>Nama:</strong> {{ $pelamar->nama_pelamar }}</p>
            <p><strong>Jenis:</strong> {{ $pelamar->pilihan_lamaran }}</p>
        </div>

        <div class="mt-4">
            <label>Pilih Pewawancara:</label>
            <select name="pewawancara_id" class="border p-1 rounded" onchange="tampilkanPanduan(this)">
                <option value="">-- Pilih --</option>
                @foreach ($daftarPewawancara as $p)
                    <option value="{{ $p->id }}">{{ $p->jabatan_pewawancara }}</option>
                @endforeach
            </select>
        </div>

        <div id="panduanContainer" class="mt-2 hidden">
            @foreach ($daftarPewawancara as $p)
                @if ($p->dokumen_pewawancara)
                    <div class="panduan" data-id="{{ $p->id }}" style="display: none;">
                        <iframe src="{{ asset('storage/' . $p->dokumen_pewawancara) }}" width="100%" height="400px" class="border"></iframe>
                        <a href="{{ asset('storage/' . $p->dokumen_pewawancara) }}" download class="text-blue-500 underline block mt-2">Download Panduan Pewawancara</a>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="mt-4">
            <label>Nama Pewawancara:</label>
            <input type="text" name="nama_pewawancara" class="w-full border p-1 rounded">
        </div>

        <div class="mt-4">
            <label>Tanggal Wawancara:</label>
            <input type="date" name="tanggal_wawancara" class="w-full border p-1 rounded">
        </div>

        <div class="mt-4">
            <label>Kesimpulan:</label>
            <textarea name="kesimpulan" rows="4" class="w-full border p-1 rounded"></textarea>
        </div>

        <div class="mt-4">
            <label>Upload Hasil Wawancara (PDF):</label>
            <input type="file" name="hasil_wawancara" accept="application/pdf" class="mt-1">
        </div>

        <div class="mt-2">
            <label for="status">Status</label>
            <select name="status" class="border p-1 rounded">
                <option value="">-- Pilih --</option>
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

<script>
    function tampilkanPanduan(select) {
        document.querySelectorAll('.panduan').forEach(el => el.style.display = 'none');
        let selectedId = select.value;
        let target = document.querySelector('.panduan[data-id="' + selectedId + '"]');
        if (target) {
            document.getElementById('panduanContainer').classList.remove('hidden');
            target.style.display = 'block';
        }
    }
</script>
