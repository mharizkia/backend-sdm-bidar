{{-- filepath: resources/views/pegawai/sertifikat/index.blade.php --}}
@extends('layouts.pegawai')

@section('content')
<h2>Daftar Sertifikat Saya</h2>
<a href="{{ route('sertifikat.create') }}">Tambah Sertifikat</a>
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Lembaga</th>
            <th>Nomor Registrasi</th>
            <th>No Sertifikat</th>
            <th>Tanggal</th>
            <th>TMT</th>
            <th>File</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sertifikats as $sertifikat)
        <tr>
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
        </tr>
        @endforeach
    </tbody>
</table>
@endsection