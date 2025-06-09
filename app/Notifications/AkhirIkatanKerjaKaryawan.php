<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AkhirIkatanKerjaKaryawan extends Notification
{
    use Queueable;

    public $karyawan;
    public $interval;

    public function __construct($karyawan, $interval)
    {
        $this->karyawan = $karyawan;
        $this->interval = $interval;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => "Masa kontrak karyawan {$this->karyawan->nama_karyawan} akan berakhir dalam {$this->interval}.",
            'karyawan_id' => $this->karyawan->id,
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Peringatan Akhir Kontrak Karyawan')
            ->line("Masa kontrak karyawan {$this->karyawan->nama_karyawan} akan berakhir dalam {$this->interval}.");
    }
}