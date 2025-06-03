<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Dosen;
use App\Models\User;
use App\Notifications\NotifikasiIkatanKerja;
use Illuminate\Support\Carbon;

class CekIkatanKerjaDosen extends Command
{
    protected $signature = 'notifikasi:ikatan-kerja';
    protected $description = 'Mengirim notifikasi jika ikatan kerja dosen akan berakhir dalam 1 bulan';

    public function handle()
    {
        $daftarIkatan = ['Luar Biasa', 'Balon Dosen', 'Calon Dosen'];
        $tanggalTarget = Carbon::now()->addMonth()->startOfDay();

        $dosens = Dosen::whereIn('ikatan_kerja', $daftarIkatan)
            ->whereDate('akhir_ikatan_kerja', $tanggalTarget)
            ->get();

        $adminUsers = User::role('admin')->get();

        foreach ($dosens as $dosen) {
            // Kirim ke admin
            foreach ($adminUsers as $admin) {
                $admin->notify(new NotifikasiIkatanKerja($dosen));
            }

            // Kirim ke dosennya
            if ($dosen->user) {
                $dosen->user->notify(new NotifikasiIkatanKerja($dosen));
            }
        }

        $this->info('Notifikasi berhasil dikirim jika ada yang akan berakhir.');
    }
}
