<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Dosen;
use App\Models\Karyawan;
use App\Models\User;
use Carbon\Carbon;
use App\Notifications\AkhirIkatanKerjaDosenNotification;
use App\Notifications\AkhirIkatanKerjaKaryawan;
use Illuminate\Support\Facades\Notification;

class CheckAkhirIkatanKerja extends Command
{
    protected $signature = 'check:akhir-ikatan-kerja';
    protected $description = 'Cek dosen yang mendekati akhir ikatan kerja dan kirim notifikasi';

    public function handle()
    {
        $today = Carbon::today();

        $dosens = Dosen::all();

        foreach ($dosens as $dosen) {
            if (!$dosen->akhir_ikatan_kerja) {
                continue;
            }

            $akhirIkatan = Carbon::parse($dosen->akhir_ikatan_kerja);
            $days = $today->diffInDays($akhirIkatan, false);

            if ($days <= 30 && $days > 0) {
                $admin = User::role('admin')->first();
                if ($admin) {
                    $admin->notify(new AkhirIkatanKerjaDosenNotification($dosen, "{$days} hari lagi"));
                }

                Notification::route('mail', config('mail.admin_address'))
                    ->notify(new AkhirIkatanKerjaDosenNotification($dosen, "{$days} hari lagi"));

                $dosen->notify(new AkhirIkatanKerjaDosenNotification($dosen, "{$days} hari lagi"));
            }
        }
    
    
        $karyawans = Karyawan::all();
        
        foreach ($karyawans as $karyawan) {
            if (!$karyawan->akhir_kontrak) continue;
            $akhirKontrak = Carbon::parse($karyawan->akhir_kontrak);
            $days = $today->diffInDays($akhirKontrak, false);
            if ($days <= 30 && $days > 0) {
                $admin = User::role('admin')->first();
                if ($admin) {
                    $admin->notify(new AkhirIkatanKerjaKaryawan($karyawan, "{$days} hari lagi"));
                }
                Notification::route('mail', config('mail.admin_address'))
                    ->notify(new AkhirIkatanKerjaKaryawan($karyawan, "{$days} hari lagi"));
                $karyawan->notify(new AkhirIkatanKerjaKaryawan($karyawan, "{$days} hari lagi"));
            }
        }
    }
}