<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Game;
use App\Manager;
use App\User;
use App\Club;
use Mail;
use App\Game_subscription;
use App\Game_waitlist_subscription;
use Illuminate\Support\Facades\Auth;
use App\Mail\Gamefull;
use App\Mail\Gamewaiting;
use App\Mail\Cancelled_enrollment;
use App\Mail\Game_enrollment_cancel;
use App\Mail\Game_enrollment_cancelled;
use DateTime;

class Game_subscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
         $id1 = Auth::id();
        $games = Game::all();
        $now = new DateTime();
        $game_subscription = Game_subscription::where('user_id', $id1)->get(); 
        return view('enroll.index', compact('games', 'now'), compact('game_subscription'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('enroll.show', ['games' => Game::findOrFail($id)]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sub = Game_subscription::find($id);
        $id1 = Auth::id();
        if($sub->subscription_status)
        {
            $sub->subscription_status = false;

            $sub->save();
            
            //find classroom_id from class_subscriptions table
            $game_id = $sub->game_id;
            //find classroom_id from classroom table
            $game2 = Game::where('game_id', $game_id)->first();

            //Update classroom table for seats available and seats booked
            if($game2->team_size === '1')
            {
                $game2->seats_booked = $game2->seats_booked-1;
                $game2->seats_available = $game2->seats_available+1;    
            }
            elseif($game2->team_size === '2')
            {
                $game2->seats_booked = $game2->seats_booked-2;
                $game2->seats_available = $game2->seats_available+2;    
            }
            elseif($game2->team_size === '4')
            {
                $game2->seats_booked = $game2->seats_booked-4;
                $game2->seats_available = $game2->seats_available+4;    
            }
            //dd($game2);
            $game2->save();

            $user = User::findOrFail($id1);

            $manager = Manager::findOrFail($game2->manager_id);
            Mail::to($manager->email)->send(new Game_enrollment_cancel($user, $manager, $game2));

            
            Mail::to($user->email)->send(new Cancelled_enrollment($user, $game2));

            $clubs = Club::findOrFail($game2->club_id);
            Mail::to($clubs->email)->send(new Game_enrollment_cancelled($user, $clubs, $game2));
            
            
        }
        /*$id1 = Auth::id();
        $games = Game::all();
        $game_subscription = Game_subscription::where('user_id', $id1)->get(); */
        //return view('enroll.index', compact('games'), compact('game_subscription')); 
        return redirect()->route('game_enrollment.index')->with('success','You have successfully unsubscribed the game');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd(request()->all());        
        $games = Game::findOrFail($id);
        $id1 = Auth::id();

        if(Game_subscription::where('user_id', '=', $id1)->where('game_id', '=', $games->game_id)->where('subscription_status', '=', 1)->exists())
        {
            return redirect()->route('gamelist')->with('info','You are already enrolled in the game');
        }
        if(Game_subscription::where('user_id', '=', $id1)->where('game_id', '=', $games->game_id)->where('subscription_status', '=', 0)->exists())
        {
            return redirect()->back()->with('info','Your enrollment has already been cancelled');
        }
        else
        {
            if($games->seats_available)
            {
                $game_enroll = new Game_subscription;
                $game_enroll->game_id = $games->game_id;
                $game_enroll->user_id = $id1;
                $game_enroll->subscription_id = uniqid('gs',true);
                $game_enroll->subscription_status = true;
                $game_enroll->is_member = true;
                if($games->team_size == 1)
                {
                    $game_enroll->team_size = 1;
                    $games->seats_booked = $games->seats_booked+1;
                    $games->seats_available = $games->seats_available-1;
                }
                elseif($games->team_size == 2)
                {
                    $game_enroll->team_size = 2;
                    $game_enroll->second_player = $request->second_player;
                    $games->seats_booked = $games->seats_booked+2;
                    $games->seats_available = $games->seats_available-2;
                }
                elseif($games->team_size == 4)
                {
                    $game_enroll->team_size = 4;
                    $game_enroll->second_player = $request->second_player;
                    $game_enroll->third_player = $request->third_player;
                    $game_enroll->forth_player = $request->forth_player;
                    $games->seats_booked = $games->seats_booked+4;
                    $games->seats_available = $games->seats_available-4;
                }
                $games->save();        
                $game_enroll->save();
                if(!$games->seats_available)
                {
                    $manager = Manager::findOrFail($games->manager_id);
                    Mail::to($manager->email)->send(new Gamefull($manager, $games));
                }

                return redirect()->route('gamelist')->with('success','You are successfully enrolled in the game'); 
            }
        
            else
            {
                $wait = new Game_waitlist_subscription;
                $id1 = Auth::id();

                $wait->game_id = $games->game_id;
                $wait->user_id = $id1;
                $wait->game_waitlist_id = uniqid('GWl',true);
                //$wait->subscription_status = true;

                $wait->save();
                $user = User::findOrFail($id1);
                $manager = Manager::findOrFail($games->manager_id);
                Mail::to($manager->email)->send(new Gamewaiting($user, $manager, $games));
                return redirect()->route('gamelist')->with('info','You have been added to the waiting list for the game'); 

            }
        }

        //$a = $classes->seats_booked;
        
        

        

        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
