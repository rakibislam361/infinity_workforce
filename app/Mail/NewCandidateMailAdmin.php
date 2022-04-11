<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
class NewCandidateMailAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $data,$admin) //User is model
    {
       $this->message=$data;
       $this->admin=$admin;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->view('email.new_register_to_admin')->with('admin',$this->admin);
    }
}
