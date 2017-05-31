<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Teacher;
use App\Manager;
use App\Player;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function index()
    {
        //
        $players = Player::all();
        return view('players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('players.create');
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
            'firstname'=> 'required|max:255',
            'lastname'=> 'required|max:255',
            'email' => 'email|max:255|unique:users'
            //'password' => 'required|string|min:6|confirmed'
        ));
        $players = new Player;
        $players->firstname = $request->firstname;
        $players->lastname = $request->lastname;
        $players->email = $request->email;
        

        $user = Auth::user();        
        $teacher = Teacher::findOrFail($user);
        $manager = Manager::findOrFail($user);
        if($teacher)
        {
            $players->user_id = $teacher->id;
            $players->added_by_teacher = 1;
            $players->added_by_manager = 0;
        }
        elseif ($manager) 
        {
            $players->user_id = $manager->id;
            $players->added_by_teacher = 0;
            $players->added_by_manager = 1;   
        }
        else
        {
            return redirect()->route('players.index')->with('error','Details not saved');            
        }       
        $players->save();
        return redirect()->route('players.index')->with('success','You have sucessfully added a player');        
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
        //
        $players = Player::find($id);
        return view('players.edit', compact('players'));
        
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
            'firstname'=> 'required|max:255',
            'lastname'=> 'required|max:255',
            'email' => 'email|max:255|unique:users'
            //'password' => 'required|string|min:6|confirmed'
        ));
        $players = Player::find($id);
        $players->firstname = $request->firstname;
        $players->lastname = $request->lastname;
        $players->email = $request->email;
        $players->save();
        return redirect()->route('players.index')->with('success','You have sucessfully updated a player');
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
