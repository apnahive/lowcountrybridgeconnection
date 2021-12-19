<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use App\Mail\Reminder;

class UserController extends Controller
{
    //
    public function welcomeMail()
    {
        $to_email = 'dev.sadiquee@gmail.com';
        Mail::to($to_email)->send(new Reminder);
        return "E-mail has been sent Successfully";  
    }


}
