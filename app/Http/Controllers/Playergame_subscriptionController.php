<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Player;
use App\User;
use App\Game_subscription;
use App\Game;
use Illuminate\Support\Facades\Auth;

class Playergame_subscriptionController extends Controller
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
        $id1 = Auth::id();
        $games = Game::where('manager_id', '=', $id1)->where('game_status', '=', 1)->get();
        return view('playergame.index', compact('games'));
    }

    public function select()
    {
        return view('playergame.inter');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        $players = Player::all();
        $games = Game::where('seats_available', '>=', 1)->where('game_status', '=', 1)->get();
        return view('playergame.create', compact('players'), compact('games'));
    }
    public function create1()
    {
        // 
        $members = User::all();
        $games = Game::where('seats_available', '>=', 1)->where('game_status', '=', 1)->get();
        return view('playergame.create1', compact('members'), compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(request()->all());
        $gameid = $request->game_name;
        $playerid = $request->player_name;
        $games = Game::findOrFail($gameid);
        //$a = $classes->seats_booked;
        if($games->seats_available)
        {
           
            $game_sub = new Game_subscription;
            $game_sub->game_id = $games->game_id;
            $game_sub->user_id = $playerid;
            $game_sub->subscription_id = uniqid('gs',true);
            $game_sub->subscription_status = true;
            $game_sub->is_member = false;

            $games->seats_booked = $games->seats_booked+1;
            $games->seats_available = $games->seats_available-1;
            $games->save();


            $game_sub->save();
            return redirect()->route('playermanager.index')->with('success','You have successfully enrolled the game'); 
        }
    }


    public function store1(Request $request)
    {
        //dd(request()->all());
        $gameid = $request->game_name;
        $memberid = $request->member_name;
        $games = Game::findOrFail($gameid);
        //$a = $classes->seats_booked;
        if($games->seats_available)
        {
           
            $game_sub = new Game_subscription;
            $game_sub->game_id = $games->game_id;
            $game_sub->user_id = $memberid;
            $game_sub->subscription_id = uniqid('gs',true);
            $game_sub->subscription_status = true;
            $game_sub->is_member = true;

            $games->seats_booked = $games->seats_booked+1;
            $games->seats_available = $games->seats_available-1;
            $games->save();


            $game_sub->save();
            return redirect()->route('playergame.index')->with('success','Member has successfully enrolled the class');
            //->with('success','You have sucessfully subscribed the class')
        }
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
        //return view('playerclass.show', ['classes' => $classes]);
        $gameid = $games->game_id;
        $game_sub = Game_subscription::all();
        //where('classroom_id', $classid)->get();
        $players = Player::all();
        $users = User::all();
        //return view('playerclass.show', ['users' => $users]);
        //return view('playerclass.show', ['class_sub' => $class_sub], ['users' => $users], ['classid' => $classid], ['players' => $players]); 
        return view('playergame.show', compact('game_sub', 'users', 'gameid', 'players', 'id'));
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
        $players = Player::find($id);
        $games = Game::where('seats_available', '>=', 1)->where('game_status', '=', 1)->get();
        return view('playergame.edit', compact('players'), compact('games'));
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
        //        dd(request()->all());
        $gameid = $request->game_name;
        $games = Game::findOrFail($gameid);
        //$a = $classes->seats_booked;
        if($games->seats_available)
        {
           
            $game_sub = new Game_subscription;
            $game_sub->game_id = $games->game_id;
            $game_sub->user_id = $id;
            $game_sub->subscription_id = uniqid('sb',true);
            $game_sub->subscription_status = true;
            $game_sub->is_member = false;

            $games->seats_booked = $games->seats_booked+1;
            $games->seats_available = $games->seats_available-1;
            $games->save();


            $game_sub->save();
            return redirect()->route('playergame.index')->with('success','You have successfully enrolled the game'); 
            //->with('success','You have sucessfully subscribed the class')
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
        //dd('game cancel hitted');
        $games = Game::findOrFail($id);
        $games->game_status = false;

        $game_sub = Game_subscription::where('game_id', $games->game_id)->where('subscription_status', '=', 1)->get();
        foreach ($game_sub as $key => $value) {
            $sub = Game_subscription::find($value->id);
            $sub->subscription_status = false;

            $sub->save();
            if($games->team_size == 1 || $sub->is_member == 0)
            {
                $games->seats_booked = $games->seats_booked-1;
                $games->seats_available = $games->seats_available+1;    
            }
            elseif ($games->team_size == 2) 
            {
                $games->seats_booked = $games->seats_booked-2;
                $games->seats_available = $games->seats_available+2;    
            }
            elseif ($games->team_size == 4) 
            {
                $games->seats_booked = $games->seats_booked-4;
                $games->seats_available = $games->seats_available+4;    
            }
            
        }

        $games->save(); 

        return redirect()->route('playermanager.index')->with('success','You have cancelled the game');
    }
    public function destroy1($id)
    {
        //dd(request()->all());
        $game_sub = Game_subscription::find($id);
        $game = Game::where('game_id', '=', $game_sub->game_id)->first();
        if($game_sub->is_member)
        {
            if($game->team_size === 1)
            {
                $game->seats_booked = $game->seats_booked-1;
                $game->seats_available = $game->seats_available+1;    
            }
            elseif($game->team_size === 2)
            {
                $game->seats_booked = $game->seats_booked-2;
                $game->seats_available = $game->seats_available+2;    
            }
            elseif($game->team_size === 4)
            {
                $game->seats_booked = $game->seats_booked-4;
                $game->seats_available = $game->seats_available+4;    
            }    
        }
        else
        {
            $game->seats_booked = $game->seats_booked-1;
            $game->seats_available = $game->seats_available+1; 
        }
        
        
        $game->save();
        $game_sub->delete();

        return redirect()->route('playermanager.index')->with('success','You have cancelled the enrollent');

    }
}
