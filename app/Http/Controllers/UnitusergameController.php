<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Game;
use App\Game_subscription;
use Illuminate\Support\Facades\Auth;

class UnitusergameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $players = User::find($id);
        //dd($players);
        $games = Game::where('seats_available', '>=', 1)->get();
        return view('unitusergame.edit', compact('players'), compact('games'));
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
        $gameid = $request->game_name;
        if(Game_subscription::where('user_id', '=', $id)->where('game_id', '=', $gameid)->where('is_member', '=', 1)->exists())
        {
            return redirect()->route('playerunits.index')->with('info','You are already enrolled in the game'); 
            
        }
        else
        {
            $games = Game::findOrFail($gameid);
            //$a = $classes->seats_booked;
            if($games->seats_available)
            {
               
                $game_sub = new Game_subscription;
                $game_sub->game_id = $games->game_id;
                $game_sub->user_id = $id;
                $game_sub->subscription_id = uniqid('sb',true);
                $game_sub->subscription_status = true;
                $game_sub->is_member = true;

                $games->seats_booked = $games->seats_booked+1;
                $games->seats_available = $games->seats_available-1;
                $games->save();


                $game_sub->save();
                return redirect()->route('playerunits.index')->with('success','You have successfully enrolled the game'); 
                //->with('success','You have sucessfully subscribed the class')
            }   
        }
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
