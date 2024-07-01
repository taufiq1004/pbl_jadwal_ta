<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SessionScheduled extends Mailable
{
    use Queueable, SerializesModels;

    public $session;
    public $lecturer;

    public function __construct($session, $lecturer)
    {
        $this->session = $session;
        $this->lecturer = $lecturer;
    }

    public function build()
    {
        return $this->subject('Notification: Thesis Session Scheduled')
                    ->view('emails.session_scheduled');
    }
}
