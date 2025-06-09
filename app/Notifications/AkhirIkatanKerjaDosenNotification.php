<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AkhirIkatanKerjaDosenNotification extends Notification
{
    use Queueable;

    public $dosen;
    public $interval;

    public function __construct($dosen, $interval)
    {
        $this->dosen = $dosen;
        $this->interval = $interval;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => "Masa ikatan kerja dosen {$this->dosen->nama_dosen} akan berakhir dalam {$this->interval}.",
            'dosen_id' => $this->dosen->id,
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Peringatan Akhir Ikatan Kerja')
            ->line("Masa ikatan kerja dosen {$this->dosen->nama_dosen} akan berakhir dalam {$this->interval}.");
    }
}