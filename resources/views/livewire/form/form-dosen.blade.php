<div>
    <div class="mb-3">
        <label>Fakultas</label>
        <select wire:model="fakultas_id" class="form-select">
            <option value="">-- Pilih Fakultas --</option>
            @foreach($fakultas as $f)
                <option value="{{ $f->id }}">{{ $f->nama_fakultas }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Prodi</label>
        <select wire:model="prodi_id" class="form-select" {{ $prodis->isEmpty() ? 'disabled' : '' }}>
            <option value="">-- Pilih Prodi --</option>
            @foreach($prodis as $p)
                <option value="{{ $p->id }}">{{ $p->nama_prodi }}</option>
            @endforeach
        </select>
    </div>
</div>
