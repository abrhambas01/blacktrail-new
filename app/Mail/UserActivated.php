<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User ; 
class UserActivated extends Mailable
{
    use Queueable, SerializesModels;


    public $user ; 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user ; 

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user-activated')
        ->with('activated_flash','You are now activated, you can now login with those credentials');
        // ->subject('You are now activated, you can now login with those credentials');
    }

}
