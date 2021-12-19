<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Special_game;

class SuperspecialgamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:superadmin');
    }
    public function index()
    {
        $special_game = Special_game::all();
        return view('superspecialgame.index', compact('special_game'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superspecialgame.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'special_game'=> 'required|max:1024',
        ));
        $special_game = new Special_game;        
        $special_game->description = $request->special_game;        
        $special_game->save();

        //redirect to other page
        return redirect()->back()->with('success','You have successfully created the special game');
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
        $game = Special_game::find($id);        
        return view('superspecialgame.edit', compact('game'));
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
        $this->validate($request, array(
            'special_game'=> 'required|max:1024',           
            
        ));
        $special_game = Special_game::find($id);
        $special_game->description = $request->special_game;        
        $special_game->save();

        //redirect to other page
        return redirect()->back()->with('success','You have successfully updated the special');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $special_game = Special_game::find($id)->delete();        
        return redirect()->route('superspecialgame.index')->with('success','You have successfully deleted special game');
    }
}
