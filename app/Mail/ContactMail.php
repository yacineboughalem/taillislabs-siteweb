<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;


    public $contactMail;

   
    public function __construct($contactMail)
    {
        $this->contactMail = $contactMail;
    }

    public function build()
    {
        return $this->subject('Email From Cliclac')
                    ->view('emails.ContactMail');
    }
}
