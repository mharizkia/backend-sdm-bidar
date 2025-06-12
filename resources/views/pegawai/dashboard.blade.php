@extends('layouts.pegawai')

@section('title', 'Dashboard Pegawai')

@section('content')
    <div class="mb-8 p-6 bg-white shadow-lg rounded-lg flex items-center space-x-4">
        <img class="h-20 w-20 rounded-full object-cover" src="{{ Auth::user() && Auth::user()->profile_photo ? asset('storage/'.Auth::user()->profile_photo) : asset('images/profil.png') }}" alt="Foto Profil">
        <div>
            <h1 class="text-2xl font-bold text-text-dark">Selamat Datang Kembali, {{ Auth::user()->name ?? 'Pegawai' }}!</h1>
            <p class="text-sm text-text-muted">Ini adalah ringkasan aktivitas dan informasi Anda.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-card-blue text-white rounded-lg shadow-lg p-6 flex items-center justify-between">
            <div>
                <div class="text-4xl font-bold">{{ $summaryData->sisa_cuti_tahunan ?? 'N/A' }} Hari</div>
                <div class="text-sm">Sisa Cuti Tahunan</div>
            </div>
            <div class="text-4xl opacity-50">
                <i class="fas fa-calendar-alt"></i>
            </div>
        </div>
        <div class="bg-card-orange text-white rounded-lg shadow-lg p-6 flex items-center justify-between">
            <div>
                <div class="text-4xl font-bold">{{ $summaryData->total_tugas ?? 'N/A' }}</div>
                <div class="text-sm">Total Tugas Aktif</div>
            </div>
            <div class="text-4xl opacity-50">
                <i class="fas fa-tasks"></i>
            </div>
        </div>
        <div class="bg-card-red text-white rounded-lg shadow-lg p-6 flex items-center justify-between">
            <div>
                <div class="text-4xl font-bold">{{ $summaryData->notifikasi_baru ?? 'N/A' }}</div>
                <div class="text-sm">Notifikasi Belum Dibaca</div>
            </div>
            <div class="text-4xl opacity-50">
                <i class="fas fa-bell"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-4">Aksi Cepat</h3>
            <div class="space-y-3">
                <a href="#" class="flex items-center p-3 bg-gray-50 hover:bg-gray-100 rounded-md transition-colors">
                    <i class="fas fa-file-signature fa-lg text-blue-500 w-8 text-center"></i>
                    <span class="ml-3 font-medium text-gray-700">Ajukan Permohonan Cuti</span>
                </a>
                <a href="#" class="flex items-center p-3 bg-gray-50 hover:bg-gray-100 rounded-md transition-colors">
                    <i class="fas fa-file-invoice-dollar fa-lg text-green-500 w-8 text-center"></i>
                    <span class="ml-3 font-medium text-gray-700">Lihat Slip Gaji</span>
                </a>
                 <a href="#" class="flex items-center p-3 bg-gray-50 hover:bg-gray-100 rounded-md transition-colors">
                    <i class="fas fa-user-edit fa-lg text-yellow-500 w-8 text-center"></i>
                    <span class="ml-3 font-medium text-gray-700">Perbarui Profil Pribadi</span>
                </a>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-4">Pengumuman Terbaru</h3>
            <ul class="space-y-4">
                <li class="flex items-start space-x-3">
                    <i class="fas fa-bullhorn text-gray-400 mt-1"></i>
                    <div>
                        <p class="font-medium text-gray-800">Jadwal Libur Nasional Idul Adha 2025</p>
                        <p class="text-xs text-gray-500">10 Juni 2025</p>
                    </div>
                </li>
                <li class="flex items-start space-x-3">
                    <i class="fas fa-bullhorn text-gray-400 mt-1"></i>
                    <div>
                        <p class="font-medium text-gray-800">Reminder: Pengisian Laporan Kinerja Bulanan</p>
                        <p class="text-xs text-gray-500">08 Juni 2025</p>
                    </div>
                </li>
                <li class="flex items-start space-x-3">
                    <i class="fas fa-bullhorn text-gray-400 mt-1"></i>
                    <div>
                        <p class="font-medium text-gray-800">Undangan Rapat Koordinasi Tahunan</p>
                        <p class="text-xs text-gray-500">05 Juni 2025</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
