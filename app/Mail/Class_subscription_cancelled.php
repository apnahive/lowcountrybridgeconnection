<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Class_subscription_cancelled extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $club, $classes)
    {
        //
        $this->club = $club;
        $this->user = $user;
        $this->classes = $classes;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.cancelsubss')->with('club',$this->club)->with('user',$this->user)->with('classes',$this->classes);
    }
}
