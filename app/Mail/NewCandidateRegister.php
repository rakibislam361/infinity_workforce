<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
class NewCandidateRegister extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $data)
    {
       $this->message=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
       return $this->view('email.new_candidate')->with('mail_data',$this->message);
        
    }
}
