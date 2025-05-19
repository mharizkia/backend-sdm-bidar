<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="update" enctype="multipart/form-data">

        <div>
            <label>Pewawancara</label>
            <select wire:model.defer="wawancara.pewawancara_id">
                <option value="">Pilih Pewawancara</option>
                @foreach ($daftarPewawancara as $pewawancara)
                    <option value="{{ $pewawancara->id }}">{{ $pewawancara->jabatan_pewawancara }}</option>
                @endforeach
            </select>
            @error('wawancara.pewawancara_id') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Nama Pewawancara</label>
            <input type="text" wire:model.defer="wawancara.nama_pewawancara" />
            @error('wawancara.nama_pewawancara') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Tanggal Wawancara</label>
            <input type="date" wire:model.defer="wawancara.tanggal_wawancara" />
            @error('wawancara.tanggal_wawancara') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Kesimpulan</label>
            <input type="text" wire:model.defer="wawancara.kesimpulan" />
            @error('wawancara.kesimpulan') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Status</label>
            <select wire:model.defer="wawancara.status">
                <option value="">Pilih</option>
                <option value="lulus">Lulus</option>
                <option value="tidak_lulus">Tidak Lulus</option>
            </select>
            @error('wawancara.status') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>File Poin Poin Wawancara (PDF)</label>
            <input type="file" wire:model="poin_poin_wawancara" accept="application/pdf" />
            @error('poin_poin_wawancara') <span class="error">{{ $message }}</span> @enderror

            @if ($poin_poin_wawancara instanceof \Illuminate\Http\UploadedFile)
                <p>Preview file: {{ $poin_poin_wawancara->getClientOriginalName() }}</p>
            @else
                <p>File sekarang: 
                    @if ($wawancara && $wawancara->poin_poin_wawancara)
                        <a href="{{ Storage::url($wawancara->poin_poin_wawancara) }}" target="_blank">Lihat dokumen</a>
                    @else
                        Tidak ada file.
                    @endif
                </p>
            @endif
        </div>

        <button type="submit">Update Wawancara</button>
    </form>
</div>