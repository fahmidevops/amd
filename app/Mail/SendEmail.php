<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $newEmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($newEmail)
    {
        $this->newEmail = $newEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('siap.bkkbn@gmail.com')
            ->subject('[Aplikasi siap.bkkbn.go.id] Anda mendapatkan undangan kegiatan baru')
            ->view('email');
    }
}
