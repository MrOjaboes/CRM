<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OfflineAdmin extends Mailable
{
    use Queueable, SerializesModels;
    private $offlinefund;
    public function __construct($offlinefund)
    {
        $this->offlinefund = $offlinefund;
    }

    public function build()
    {
        return $this->subject("Offline Savings")->from('finance@vcass.org')->markdown('emails.adminoffline', ['offlinefund' => $this->offlinefund]);
    }
}
