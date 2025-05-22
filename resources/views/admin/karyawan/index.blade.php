@extends('layouts.app')

@section('content')

<div class="p-4">
    <h2 class="text-lg font-bold mb-4">Data karyawan</h2>

    @if (session('message'))
        <div class="text-green-600 mb-2">{{ session('message') }}</div>
    @endif

    <table class="w-full border mb-4">
        <thead>
            <tr>
                <th class="border px-2">Nama</th>
                <th class="border px-2">Jabatan</th>
                <th class="border px-2">Tempat Lahir</th>
                <th class="border px-2">Tanggal Lahir</th>
                <th class="border px-2">Jenis Kelamin</th>
                <th class="border px-2">Email</th>
                <th class="border px-2">No HP</th>
                <th class="border px-2">Status</th>
                <th class="border px-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $karyawan)
                <tr>
                    <td class="border px-2">{{ $karyawan->nama_karyawan }}</td>
                    <td class="border px-2">{{ $karyawan->jabatan }}</td>
                    <td class="border px-2">{{ $karyawan->tempat_lahir }}</td>
                    <td class="border px-2">{{ $karyawan->tanggal_lahir }}</td>
                    <td class="border px-2">{{ $karyawan->jenis_kelamin }}</td>
                    <td class="border px-2">{{ $karyawan->email }}</td>
                    <td class="border px-2">{{ $karyawan->no_hp }}</td>
                    <td class="border px-2">{{ $karyawan->status_aktivasi }}</td>
                    <td class="border px-2">
                        <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection