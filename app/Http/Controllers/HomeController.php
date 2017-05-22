<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\NewUserWelcome;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Classroom;
use App\Class_subscription;
use App\Game;
use App\Class_category;

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
        $cat = Classroom::select('category_name')->distinct()->get();
        $id1 = Auth::id();
        $class_subscription = Class_subscription::where('user_id','!=',  $id1)->get(); 
        $classes = Classroom::all();
       // $classes = Classroom::all();
        return view('classes', compact('classes'), compact('cat'), compact('class_subscription'));
        
    }

    public function showGame()
    {
        $games = Game::all();  
        return view('games', compact('games'));
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

