<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Message;
class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Message $mail)
    {
        $this->message=$mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
          return $this->view('email.contact_mail')->with('msg',$this->message);
    }
}
