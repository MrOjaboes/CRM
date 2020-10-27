<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OfflineUser extends Mailable
{
    use Queueable, SerializesModels;

    private $users;
    private $transaction;

    public function __construct($users, $transaction)
    {
        $this->users = $users;
        $this->transaction = $transaction;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $users = $this->users;
        $transaction = $this->transaction;
        return $this->subject("Savings")->from('finance@vcass.org')->markdown('emails.offlineuser', compact('users', 'transaction'));
    }
}
