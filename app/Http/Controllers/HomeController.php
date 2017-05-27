<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\NewUserWelcome;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Classroom;
use App\Class_subscription;
use App\Waitlist_subscription;
use App\Game_subscription;
use App\Game;
use App\User;
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
        $class_subscription = Class_subscription::select('classroom_id')->where('user_id', $id1)->get(); 
        $waitlist_subscription = Waitlist_subscription::select('classroom_id')->where('user_id', $id1)->get(); 
        $classes = Classroom::whereNotIn('classroom_id', $class_subscription)->whereNotIn('classroom_id', $waitlist_subscription)->get(); 
       // $classes = Classroom::all();
        return view('classes', compact('classes'), compact('cat'));
        
    }

    public function showGame()
    {
        $id1 = Auth::id();
        $game_subscription = Game_subscription::select('game_id')->where('user_id', $id1)->get(); 
        $games = Game::whereNotIn('game_id', $game_subscription)->get(); 
       // $classes = Classroom::all();
        return view('games', compact('games'));        
    }

    public function showContact()
    {
        return view('contact');
    }

    public function showProfile()
    {
        $id1 = Auth::id();        
        $profile = User::find($id1);
        return view('profile', ['profile' => $profile]);
    }

    public function showNews()
    {
        return view('news');
    }

}

