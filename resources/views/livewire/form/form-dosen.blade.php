<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="mb-3">
            <label for="nama_dosen">Nama Dosen</label>
            <input type="text" id="nama_dosen" wire:model="nama_dosen" class="form-control">
            @error('nama_dosen') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="fakultas_id">Fakultas</label>
            <select id="fakultas_id" wire:model="fakultas_id" class="form-select">
                <option value="">-- Pilih Fakultas --</option>
                @foreach($fakultas as $f)
                    <option value="{{ $f->id }}">{{ $f->nama_fakultas }}</option>
                @endforeach
            </select>
            @error('fakultas_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="prodi_id">Prodi</label>
            <select id="prodi_id" wire:model="prodi_id" class="form-select" {{ empty($prodis) ? 'disabled' : '' }}>
                <option value="">-- Pilih Prodi --</option>
                @foreach($prodis as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_prodi }}</option>
                @endforeach
            </select>
            @error('prodi_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="jabatan_akademik_id">Jabatan Akademik</label>
            <select id="jabatan_akademik_id" wire:model="jabatan_akademik_id" class="form-select">
                <option value="">-- Pilih Jabatan Akademik --</option>
                @foreach($jabatan_akademiks as $j)
                    <option value="{{ $j->id }}">{{ $j->nama_jabatan_akademik }}</option>
                @endforeach
            </select>
            @error('jabatan_akademik_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="golongan_id">Golongan</label>
            <select id="golongan_id" wire:model="golongan_id" class="form-select" {{ empty($golongans) ? 'disabled' : '' }}>
                <option value="">-- Pilih Golongan --</option>
                @foreach($golongans as $g)
                    <option value="{{ $g->id }}">{{ $g->nama_golongan }}</option>
                @endforeach
            </select>
            @error('golongan_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>