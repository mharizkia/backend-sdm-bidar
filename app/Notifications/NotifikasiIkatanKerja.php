<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifikasiIkatanKerja extends Notification
{
    use Queueable;

    public $dosen;

    public function __construct($dosen)
    {
        $this->dosen = $dosen;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Pemberitahuan Ikatan Kerja Akan Berakhir')
            ->greeting('Halo!')
            ->line("Ikatan kerja dosen bernama {$this->dosen->nama_dosen} dengan status '{$this->dosen->ikatan_kerja}' akan berakhir pada tanggal {$this->dosen->tanggal_akhir_ikatan_kerja->format('d-m-Y')}.")
            ->line('Segera lakukan tindak lanjut.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
