<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Game;
use App\Club;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();  
        return view('games.index', compact('games'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubs = DB::table('clubs')->get();
        return view('games.create',  ['clubs' => $clubs]);
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
        $this->validate($request, array(
            'game_name'=> 'required|max:255',            
            'club_id'=> 'numeric|min:1',
            'game_description'=> 'required|max:255',
            'game_date'=> 'required|date|after:tomorrow',            
            'team_size'=> 'numeric|min:2|max:200'            
        ));

        //store in database
        $game = new Game;

        $game->game_name = $request->game_name;
        $game->club_id = $request->club_id;
        $game->game_date = $request->game_date;        
        $game->team_size = $request->team_size;        
        $game->game_description = $request->game_description;        

        $game->save();

        //redirect to other page
        return redirect()->route('games.show',$game->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game1 = Game::find($id);

        //$clubs = DB::select('select * from clubs where id = ', $game1->club_id);
        $id1 = $game1->club_id;
        //$clubs => Club::findOrFail($club->id); 
        //$clubs = DB::table('clubs')->where('id', $game1->club_id)->get();
       return view('games.show', ['games' => Game::findOrFail($id)], ['clubs' => Club::findOrFail($id1)]);
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
