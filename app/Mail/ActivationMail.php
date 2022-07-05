<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $code;
    private $email;
    public function __construct($code,$email)
    {
        //
        $this->code = $code;
        $this->email= $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->markdown('mails.activation')
            ->with('code',$this->code)
            ->with('email',$this->email)
            ->subject('Activation Mail');

    }
}
