<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestLoan extends Mailable
{
    use Queueable, SerializesModels;

    private $loan;
    public function __construct($loan)
    {
        $this->loan = $loan;
    }

    public function build()
    {
        return $this->subject("Loan Request")->from('finance@vcass.org')->markdown('emails.requestloan', ['loan' => $this->loan]);
    }
}
