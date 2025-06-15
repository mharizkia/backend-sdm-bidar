{{-- filepath: resources/views/admin/sertifikat/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<h2>Validasi Sertifikat Pegawai</h2>
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Nama Pegawai</th>
            <th>Lembaga</th>
            <th>Nomor Registrasi</th>
            <th>No Sertifikat</th>
            <th>Tanggal</th>
            <th>TMT</th>
            <th>File</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sertifikats as $sertifikat)
        <tr>
            <td>{{ $sertifikat->user->name ?? '-' }}</td>
            <td>{{ $sertifikat->lembaga }}</td>
            <td>{{ $sertifikat->nomor_registrasi }}</td>
            <td>{{ $sertifikat->no_sertifikat }}</td>
            <td>{{ $sertifikat->tanggal_sertifikat }}</td>
            <td>{{ $sertifikat->tmt_sertifikat }}</td>
            <td>
                @if($sertifikat->file_sertifikat)
                    <a href="{{ asset('storage/'.$sertifikat->file_sertifikat) }}" target="_blank">Lihat File</a>
                @else
                    -
                @endif
            </td>
            <td>{{ ucfirst($sertifikat->status) }}</td>
            <td>
                <form action="{{ route('admin.sertifikat.validate', $sertifikat->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <select name="status">
                        <option value="pending" {{ $sertifikat->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="terima" {{ $sertifikat->status == 'terima' ? 'selected' : '' }}>Terima</option>
                        <option value="tolak" {{ $sertifikat->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
                    </select>
                    <button type="submit">Update</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection