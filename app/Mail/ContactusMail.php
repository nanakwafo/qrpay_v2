<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactusMail extends Mailable
{
    use Queueable, SerializesModels;


    private $senderEmail;
    private $senderName;
    private $contactmessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($senderEmail,$senderName,$contactmessage)
    {
        //
        $this->senderEmail = $senderEmail;
        $this->senderName = $senderName;
        $this->contactmessage = $contactmessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.contact-message')
            ->with('senderName',$this->senderName)
            ->with('senderEmail',$this->senderEmail)
            ->with('senderMessage',$this->contactmessage)
            ;
    }
}
