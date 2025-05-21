@extends('layouts.app')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Pewawancara</h1>
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='{{ route('pewawancara.create') }}'">Tambah</button>
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">No</th>
                                <th class="py-2 px-4 border-b">Nama Pewawancara</th>
                                <th class="py-2 px-4 border-b">Dokumen Pewawancara</th>
                                <th class="py-2 px-4 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pewawancaras as $index => $p)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                                    <td class="py-2 px-4 border-b">{{ $p->jabatan_pewawancara }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ asset('storage/' . $p->dokumen_pewawancara) }}" target="_blank" class="text-blue-500 underline">Lihat Dokumen</a>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
@endsection