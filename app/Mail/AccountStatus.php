<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\Job;
use Illuminate\Queue\InteractsWithQueue;

use App\User;
class AccountStatus extends Mailable implements ShouldQueue
{
   use InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
         $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->view('email.account_status')->with('user',$this->user);
    }
}
