@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

<form action="{{ route('pelamar.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="nama_pelamar" placeholder="Nama Pelamar" value="{{ old('nama_pelamar') }}" required>
    <input type="text" name="nidn" placeholder="NIDN (opsional)" value="{{ old('nidn') }}">
    <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}" required>
    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>

    <select name="jenis_kelamin" required>
        <option value="">Pilih Jenis Kelamin</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select>

    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
    <input type="text" name="no_hp" placeholder="No HP" value="{{ old('no_hp') }}" required>
    <input type="text" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}" required>
    <input type="text" name="pendidikan_tertinggi" placeholder="Pendidikan Tertinggi" value="{{ old('pendidikan_tertinggi') }}" required>
    <input type="number" name="umur" placeholder="Umur" value="{{ old('umur') }}" required>
    <input type="number" step="0.01" name="ipk" placeholder="IPK" value="{{ old('ipk') }}" required>
    <input type="text" name="bidang_ilmu_kompetensi" placeholder="Bidang Ilmu" value="{{ old('bidang_ilmu_kompetensi') }}" required>

    <select name="pilihan_lamaran" required>
        <option value="">Pilih Lamaran</option>
        <option value="dosen">Dosen</option>
        <option value="karyawan">Karyawan</option>
    </select>

    <input type="date" name="tanggal_lamaran" value="{{ old('tanggal_lamaran') }}" required>
    <input type="file" name="dokumen_lamaran" accept="application/pdf" required>

    <select name="status">
        <option value="">Pilih Status</option>
        <option value="pending">Pending</option>
        <option value="diterima">Diterima</option>
        <option value="ditolak">Ditolak</option>
    </select>

    <button type="submit">Simpan</button>
</form>
