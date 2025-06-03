<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Dosen;
use Carbon\Carbon;
use App\Notifications\AkhirIkatanKerjaNotification;
use Illuminate\Support\Facades\Notification;

class CheckAkhirIkatanKerja extends Command
{
    protected $signature = 'check:akhir-ikatan-kerja';
    protected $description = 'Cek dosen yang mendekati akhir ikatan kerja dan kirim notifikasi';

    public function handle()
    {
        $today = Carbon::today();

        $intervals = [
            365 => '1 tahun',
            180 => '6 bulan',
            90  => '3 bulan',
            30  => '1 bulan',
        ];

        foreach ($intervals as $days => $label) {
            $targetDate = $today->copy()->addDays($days);
            $dosens = Dosen::whereDate('akhir_ikatan_kerja', $targetDate)->get();

            foreach ($dosens as $dosen) {
                // Notifikasi untuk admin dan dosen jika 1 bulan
                if ($days == 30) {
                    // Kirim ke admin
                    Notification::route('mail', config('mail.admin_address'))
                        ->notify(new AkhirIkatanKerjaNotification($dosen, $label));
                }
                // Kirim ke dosen
                $dosen->notify(new AkhirIkatanKerjaNotification($dosen, $label));
            }
        }
    }
}