<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }   
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("VCASS Registration")->from('welcome@vcass.org')->markdown('emails.newuser', ['user' => $this->user]);
    }
}
