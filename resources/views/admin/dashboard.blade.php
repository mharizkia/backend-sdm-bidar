@extends('layouts.admin')

@section('title', 'Dashboard Utama')

@section('content')
    <div class="mb-12">
        <h1 class="text-2xl font-semibold text-text-dark">Selamat Datang, {{ Auth::user()->name ?? 'admin' }}!</h1>
        <p class="text-sm text-text-muted">Berikut adalah ringkasan aktivitas dan data terbaru sistem.</p>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 md:gap-6">

        <div class="lg:col-span-3 flex flex-col space-y-4 md:space-y-6">

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 md:gap-6">
                <!-- Card Jumlah Pegawai -->
                <div class="rounded-lg border border-gray-200 bg-card-green p-6 shadow-sm text-white flex flex-col justify-between h-full">
                    <div>
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-4xl font-bold">{{ $totalPegawaiKeseluruhan ?? '200' }}</h4>
                                <span class="text-sm font-medium">Jumlah Pegawai</span>
                            </div>
                            <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-white bg-opacity-25">
                                <i class="fas fa-users text-2xl text-white"></i>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('pegawai.index') }}" class="mt-4 block text-center text-sm font-medium hover:font-bold">Menu Pegawai</a>
                </div>

                <div class="rounded-lg border border-gray-200 bg-card-blue p-6 shadow-sm text-white flex flex-col justify-between h-full">
                    <div>
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-4xl font-bold">{{ $jumlahSertifikasi ?? '69' }}</h4>
                                <span class="text-sm font-medium">Jumlah Sertifikasi Masuk</span>
                            </div>
                            <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-white bg-opacity-25">
                                <i class="fas fa-file-contract text-2xl text-white"></i>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="mt-4 block text-center text-sm font-medium hover:font-bold">Menu Penilaian</a>
                </div>

                <div class="rounded-lg border border-gray-200 bg-card-red p-6 shadow-sm text-white flex flex-col justify-between h-full">
                    <div>
                        <div>
                            <h4 class="text-2xl font-semibold mb-1">Periode Aktif</h4>
                            <span class="text-4xl font-bold">{{ $periodeAktif ?? 'Jan - Juni' }}</span>
                        </div>
                    </div>
                    <a href="#" class="mt-2 block text-center text-sm font-medium hover:font-bold">Menu Periode</a>
                </div>
            </div>

            <div class="rounded-lg border border-gray-200 bg-card-orange p-6 shadow-sm text-white flex flex-col flex-grow">
                <div class="mb-4 flex items-center justify-between flex-shrink-0">
                    <h4 class="text-lg font-semibold">Ringkasan Performa Pegawai</h4>
                    <i class="fas fa-chart-line text-xl"></i>
                </div>
                <div class="flex justify-center items-center flex-grow h-full">
                    <div class="relative w-full h-full max-w-[250px] sm:max-w-[300px] aspect-square mx-auto">
                        <canvas id="performaPegawaiChart"></canvas>
                        <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                            <span class="text-3xl font-bold text-white">{{ $persentasePerforma ?? 100 }}%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rounded-lg border border-gray-200 bg-notification-bg p-6 shadow-sm text-white lg:col-span-1 flex flex-col h-full">
            <div class="mb-4 flex items-center justify-between flex-shrink-0">
                <h4 class="text-lg font-semibold">Notifikasi</h4>
                <i class="fas fa-bell text-xl"></i>
            </div>
            <div class="space-y-3 flex-grow overflow-y-auto">
                @forelse ($notifications ?? [] as $notification)
                    <div class="flex items-center justify-between p-2.5 bg-gray-700 bg-opacity-50 rounded-md">
                        <div>
                            <p class="text-sm font-medium"> {{ $notification->data['message'] ?? '-' }}</p>
                        </div>
                    </div>
                @empty
                    @for ($i = 0; $i < 8; $i++)
                    <div class="flex items-center justify-between p-2.5 bg-gray-700 bg-opacity-50 rounded-md">
                        <div>
                            <p class="text-sm font-medium">Contoh Notifikasi ({{ $i + 1 }})</p>
                            <p class="text-xs text-gray-300">Mei {{ 1 + $i }}, 2025</p>
                        </div>
                        @if($i == 0)
                        <span class="text-xs px-2 py-1 bg-red-500 text-white rounded-full">New</span>
                        @endif
                    </div>
                    @endfor
                    <p class="text-sm text-gray-400 text-center py-4">Tidak ada notifikasi baru.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctxPerforma = document.getElementById('performaPegawaiChart');

    if (ctxPerforma) {
        const performaBaik = {{ $performaBaik ?? 70 }};
        const performaCukup = {{ $performaCukup ?? 20 }};
        let performaKurangHitung = 100 - (performaBaik + performaCukup);
        const performaKurang = performaKurangHitung > 0 ? performaKurangHitung : 0;

        const colorCardGreen = '#28A745';
        const colorSidebarActive = '#F7C325';
        const colorCardRed = '#DC3545';
        const colorCardOrange = '#FD7E14';

        new Chart(ctxPerforma, {
            type: 'doughnut',
            data: {
                labels: ['Baik', 'Cukup', 'Kurang'],
                datasets: [{
                    label: 'Performa Pegawai',
                    data: [performaBaik, performaCukup, performaKurang],
                    backgroundColor: [
                        colorCardGreen,
                        colorSidebarActive,
                        colorCardRed
                    ],
                    borderColor: [
                        colorCardOrange,
                        colorCardOrange,
                        colorCardOrange
                    ],
                    borderWidth: 2,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed !== null) {
                                    label += context.parsed + '%';
                                }
                                return label;
                            }
                        }
                    }
                }
            }
        });
    }
});
</script>
@endpush