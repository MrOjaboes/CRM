<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Transaction extends Mailable
{
    use Queueable, SerializesModels;

    private $transaction;
    public $pdf;
    public function __construct($transaction, $pdf)
    {
        $this->transaction = $transaction;
        $this->pdf = $pdf;
    }

    public function build()
    {
        $pdf = $this->pdf;
        return $this->subject("Transaction Request")
            ->from('finance@vcass.org')
            ->attachData($pdf, 'transaction.pdf', [
                'mime' => 'application/pdf'
            ])
            ->markdown('emails.usersingle', ['transaction' => $this->transaction]);
    }
}
