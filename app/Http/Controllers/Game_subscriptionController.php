<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Game;
use App\Game_subscription;
use Illuminate\Support\Facades\Auth;


class Game_subscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $id1 = Auth::id();
        $games = Game::all();
        $game_subscription = Game_subscription::where('user_id', $id1)->get(); 
        return view('enroll.index', compact('games'), compact('game_subscription'));
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
        if($sub->subscription_status)
        {
            $sub->subscription_status = false;

            $sub->save();
            
            //find classroom_id from class_subscriptions table
            $game_id = $sub->game_id;
            //find classroom_id from classroom table
            $game2 = Game::where('game_id', $game_id)->first();

            //Update classroom table for seats available and seats booked
            
            $game2->seats_booked = $game2->seats_booked-1;
            $game2->seats_available = $game2->seats_available+1;
            $game2->save();
        }
        $id1 = Auth::id();
        $games = Game::all();
        $game_subscription = Game_subscription::where('user_id', $id1)->get(); 
        //return view('enroll.index', compact('games'), compact('game_subscription')); 
        return redirect()->route('enroll.index')->with('success','You have sucessfully unsubscribed the game');
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
        //
        $games = Game::findOrFail($id);
        //$a = $classes->seats_booked;
        $games->seats_booked = $games->seats_booked+1;
        $games->save();

        $game_enroll = new Game_subscription;
        $id1 = Auth::id();

        $game_enroll->game_id = $games->game_id;
        $game_enroll->user_id = $id1;
        $game_enroll->subscription_id = uniqid('gs',true);
        $game_enroll->subscription_status = true;
        $game_enroll->save();

        //
        return redirect()->route('gamelist')->with('success','You have sucessfully subscribed for the game'); 
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
