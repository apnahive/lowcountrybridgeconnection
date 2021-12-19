<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Message_Admin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $comment;

    public function __construct($data, $user)
    {
        //
       $this->comment = $data;
       $this->user = $user;    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        
        return $this->markdown('emails.messagex')->with('comment',$this->comment)->with('user',$this->user);
        
    }
}
