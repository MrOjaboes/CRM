<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AcceptLoan extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $loan;

    public function __construct($user, $loan)
    {
        $this->user = $user;
        $this->loan = $loan;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;
        $loan = $this->loan;
        return $this->subject("Loan")->from('loan@vcass.org')->markdown('emails.acceptloan', compact('user', 'loan'));
    }
}
