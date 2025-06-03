{{-- filepath: resources/views/admin/psikologi/show.blade.php --}}
@extends('layouts.admin')

@section('title', 'Detail Tes Psikologi Pelamar')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Detail Tes Psikologi</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-[#1D3F8E] text-white p-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold">Detail Data Tes Psikologi</h2>
            <a href="{{ route('psikologi.index') }}" class="text-sm bg-white text-[#1D3F8E] hover:bg-gray-100 font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Psikologi
            </a>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <div class="mb-2"><span class="font-semibold">Kode Pelamar:</span> {{ $psikologi->pelamar->kode ?? '-' }}</div>
                    <div class="mb-2"><span class="font-semibold">Nama Pelamar:</span> {{ $psikologi->pelamar->nama_pelamar ?? '-' }}</div>
                    <div class="mb-2"><span class="font-semibold">Tanggal Tes:</span> {{ $psikologi->tanggal_psikologis }}</div>
                </div>
                <div>
                    <div class="mb-2"><span class="font-semibold">Kesimpulan:</span> {{ $psikologi->kesimpulan }}</div>
                    <div class="mb-2"><span class="font-semibold">Status:</span>
                        @if($psikologi->status == 'lulus' || $psikologi->status == 'Lulus')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Lulus</span>
                        @elseif($psikologi->status == 'pending' || $psikologi->status == 'Pending')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">{{ ucfirst($psikologi->status) }}</span>
                        @endif
                    </div>
                    <div class="mb-2"><span class="font-semibold">Dokumen Hasil Psikologi:</span>
                        @if($psikologi->hasil_psikologis)
                            <a href="{{ asset('storage/' . $psikologi->hasil_psikologis) }}" target="_blank" class="text-blue-600 hover:text-blue-800 underline ml-1">
                                <i class="fas fa-file-pdf mr-1"></i>Lihat Dokumen
                            </a>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection