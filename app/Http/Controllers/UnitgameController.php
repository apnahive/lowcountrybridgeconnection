<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Game;
use App\Club;
use App\Manager;
use Illuminate\Support\Facades\Auth;
use App\Game_subscription;
use App\Game_waitlist_subscription;

class UnitgameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:unitadmin');
    }
    
    public function index()
    {
        //
       $games = Game::all(); 
       $clubs = Club::all() ;
       foreach ($games as $key => $game) 
       {
            //dd($class);
            if(Manager::where('id', $game->manager_id)->exists())
            {
                $teach = Manager::where('id', $game->manager_id)->first();
                $game->manager = $teach->name;    
            }
            else
            {
                $game->manager = 'N/A';    
            }            
       }
       return view('unitgame.index', compact('games', 'clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clubs = DB::table('clubs')->get();
        $managers = Manager::all();
        return view('unitgame.create', compact('clubs', 'managers'));
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
        $this->validate($request, array(
            'game_name'=> 'required|max:255',
            'manager_name'=> 'numeric|min:1',
            'game_description'=> 'required|max:255',
            'game_date'=> 'required|date|after:tomorrow',
            'team_size'=> 'numeric|min:1|max:200',
            'max_enroll'=> 'numeric|min:1|max:200'
        ));

        $a = (int)$request->max_enroll;
        $b = (int)$request->team_size;

        if($a%$b == 0)
        {

        //store in database
        $game = new Game;

        $game->game_name = $request->game_name;
        $game->club_name = " ";
        
        $game->game_date = $request->game_date;        
        $game->team_size = $request->team_size;        
        $game->game_description = $request->game_description; 
        $game->max_enroll = $request->max_enroll;        
        $game->game_id = uniqid('game',true);
        $id1 = $request->manager_name; 
        $manager = Manager::find($id1);
        $game->manager_id = $manager->id;
        $game->club_id = $manager->club_id;
        $game->game_status = true;
        $game->seats_available = $request->max_enroll;
        $game->seats_booked = '0';
        $game->start_time = $request->start_time;
        /*if($request->tournament == 'true')
            $game->tournament = true;
        else
            $game->tournament = false;*/
        $game->save();

        //redirect to other page
        return redirect()->route('unitgame.show', $game->id)->with('success','You have successfully created a game');
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
        if(Manager::where('id', $games->manager_id)->exists())
        {
            $teach = Manager::where('id', $games->manager_id)->first();
            $games->manager = $teach->name;    
        }
        else
        {
            $games->manager = 'N/A';    
        }          
        return view('unitgame.show', compact('games'));
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
        $games = Game::find($id);
        $clubs = DB::table('clubs')->get();
        $managers = Manager::all();
        return view('unitgame.edit', compact('clubs', 'managers', 'games'));
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
        $this->validate($request, array(
            'game_name'=> 'required|max:255',
            
            'game_description'=> 'required|max:255',
            'game_date'=> 'required|date|after:tomorrow',
            'team_size'=> 'numeric|min:1|max:200'            
        ));

        $game = Game::find($id);

        $game->game_name = $request->input('game_name');
        
        $game->game_date = $request->input('game_date');        
        $game->team_size = $request->input('team_size');        
        $game->game_description = $request->input('game_description'); 
        $game->start_time = $request->start_time;       
       /* if($request->tournament == 'true')
            $game->tournament = true;
        else
            $game->tournament = false;*/
        $game->save();

        //redirect to other page
        return redirect()->route('unitgame.show',$game->id)->with('success','You have successfully updated the game');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = Game::find($id);
        $game_sub = Game_subscription::where('game_id', $game->game_id);
        $wait = Game_waitlist_subscription::where('game_id', $game->game_id);
        $game_sub->delete();
        $wait->delete();
        $game->delete();
        return redirect()->route('unitgame.index')->with('success', 'You have successfully deleted the game');
    }
}
