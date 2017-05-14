<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\NewUserWelcome;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function email()
    {
        //send the email
        Mail::to(Auth::user()->email)->send(new NewUserWelcome());
        return redirect('/home');
    }

    public function showClass()
    {
        return view('classes');
    }

    public function showGame()
    {
        return view('games');
    }

    public function showContact()
    {
        return view('contact');
    }

    public function showProfile()
    {
        return view('profile');
    }

    public function showNews()
    {
        return view('news');
    }

}

