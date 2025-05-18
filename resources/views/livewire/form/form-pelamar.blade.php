<div class="max-w-xl mx-auto mt-8 p-6 bg-white shadow rounded">
    <h2 class="text-xl font-bold mb-4">Form Pelamar</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="simpan">
        <div class="mb-4">
            <label class="block font-medium">nama pelamar</label>
            <input type="text" wire:model.defer="nama_pelamar" class="w-full border rounded p-2">
            @error('nama_pelamar') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">nidn</label>
            <input type="text" wire:model.defer="nidn" class="w-full border rounded p-2">
            @error('nidn') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">tempat_lahir</label>
            <input type="text" wire:model.defer="tempat_lahir" class="w-full border rounded p-2">
            @error('tempat_lahir') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">tanggal_lahir</label>
            <input type="date" wire:model.defer="tanggal_lahir" class="w-full border rounded p-2">
            @error('tanggal_lahir') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">jenis_kelamin</label>
            <select wire:model.defer="jenis_kelamin" class="w-full border rounded p-2">
                <option value="">-- Pilih --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
            @error('jenis_kelamin') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">email</label>
            <input type="email" wire:model.defer="email" class="w-full border rounded p-2">
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">no_hp</label>
            <input type="text" wire:model.defer="no_hp" class="w-full border rounded p-2">
            @error('no_hp') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">alamat</label>
            <input type="text" wire:model.defer="alamat" class="w-full border rounded p-2">
            @error('alamat') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">pendidikan_tertinggi</label>
            <select wire:model.defer="pendidikan_tertinggi" class="w-full border rounded p-2">
                <option value="">-- Pilih --</option>
                <option value="SMA">SMA</option>
                <option value="DIPLOMA-3">D3</option>
                <option value="STRATA-1">S1</option>
                <option value="STRATA-2">S2</option>
                <option value="STRATA-3">S3</option>
            </select>
            @error('pendidikan_tertinggi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">umur</label>
            <input type="text" wire:model.defer="umur" class="w-full border rounded p-2">
            @error('umur') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>    

        <div class="mb-4">
            <label class="block font-medium">ipk</label>
            <input type="text" wire:model.defer="ipk" class="w-full border rounded p-2">
            @error('ipk') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">bidang_ilmu_kompetensi</label>
            <input type="text" wire:model.defer="bidang_ilmu_kompetensi" class="w-full border rounded p-2">
            @error('bidang_ilmu_kompetensi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-4">
            <label class="block font-medium">pilihan_lamaran Pelamar</label>
            <select wire:model.defer="pilihan_lamaran" class="w-full border rounded p-2">
                <option value="">-- Pilih --</option>
                <option value="dosen">Dosen</option>
                <option value="karyawan">Karyawan</option>
            </select>
            @error('pilihan_lamaran') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-4">
            <label class="block font-medium">tanggal_lamaran</label>
            <input type="date" wire:model.defer="tanggal_lamaran" class="w-full border rounded p-2">
            @error('tanggal_lamaran') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">dokumen_lamaran</label>
                <input type="file" wire:model="dokumen_lamaran" accept="application/pdf"><br>
                @error('dokumen_lamaran') <span style="color:red">{{ $message }}</span><br> @enderror
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Simpan Pelamar
        </button>
    </form>
</div>
