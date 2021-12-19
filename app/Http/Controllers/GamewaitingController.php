<?php

namespace App\Http\Controllers;
use App\Game_waitlist_subscription;
use App\Game;
use App\User;
use Mail;
use App\Mail\Gameopenslot;


use Illuminate\Http\Request;

class GamewaitingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:manager');
    }
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
        $games = Game::findOrFail($id);        
        $gameid = $games->game_id;
        $users = User::all();

        $waiting = Game_waitlist_subscription::where('game_id', '=', $gameid)->get();
        return view('gamewait.show', compact('waiting', 'users', 'games', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $waiting = Game_waitlist_subscription::find($id);
        $member = User::find($waiting->user_id);
        //dd($member);
        $game = Game::where('game_id', '=', $waiting->game_id)->first();
        
        Mail::to($member->email)->send(new Gameopenslot($game, $member));  
        return redirect()->route('manager.index')->with('success','You have successfully send the mail to the registered member.');  
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
