<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Gamewaiting extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $manager, $games)
    {
        //
        $this->manager = $manager;
        $this->user = $user;
        $this->games = $games;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.gamewaiting')->with('user',$this->user)->with('manager',$this->manager)->with('games',$this->games);
    }
}
