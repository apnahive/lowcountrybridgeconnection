<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Teacher;
use App\Manager;
use App\Player;
use App\User;
use App\Classroom;
use App\Game;
use App\Unitadmin;
use App\Class_subscription;
use App\Game_subscription;
use App\Series_subscription;


class PlayerunitController extends Controller
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
        //$players = Player::all();
        $players = Player::paginate(10);
        $users = User::paginate(10);
        return view('playersunit.index', compact('players', 'users'));
    }
    public function search(Request $request)
    {
        //dd(request()->all()); 
        /*$search = $request->q;
        $players = Player::where('name', 'like', '%'.$search.'%')->orWhere('lastname', 'like', '%'.$search.'%')->orWhere('email', 'like', '%'.$search.'%')->get();
        return view('playersunit.search', compact('players'));*/
        $search = $request->q;

        if($request->q == '')
        {
            //dd('blank found');
            $players = null;
            $users = null;
        }
        else
        {
            $players = Player::where('name', 'like', '%'.$search.'%')->orWhere('lastname', 'like', '%'.$search.'%')->orWhere('email', 'like', '%'.$search.'%')->get();
            $users = User::where('name', 'like', '%'.$search.'%')->orWhere('lastname', 'like', '%'.$search.'%')->orWhere('email', 'like', '%'.$search.'%')->get();    
        }
        
        return view('playersunit.search', compact('players', 'users'));
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('playersunit.create');
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
            'name'=> 'required|max:255',
            'lastname'=> 'required|max:255',
            'email' => 'email|max:255|unique:users'
            //'password' => 'required|string|min:6|confirmed'
        ));
        $bool1 = true;
        $players = Player::all();
        foreach ($players as $playerkey => $player) {
            if($request->email == $player->email)
            {
                $bool1 = false;
                return redirect()->route('playerunits.index')->with('error','This email is already registered as member or student/player in our system. Please use another email');
            }
        }
        $players = new Player;
        $players->name = $request->name;
        $players->lastname = $request->lastname;
        $players->email = $request->email;
        $players->update_code = 'L';
        $players->mailing_options = $request->mailing_options;
        
        $user = Auth::user();                
        $unitadmin = Unitadmin::findOrFail($user)->first();        
        if ($unitadmin) 
        {
            $players->user_id = $unitadmin->id;
            $players->added_by_teacher = 0;
            $players->added_by_manager = 0; 
            $players->added_by_unitadmin = 1;
            $players->added_by_superadmin = 0;   
        }
        else
        {
            return redirect()->route('playerunits.index')->with('error','Details not saved');            
        }       
        $players->save();
        return redirect()->route('playerunits.index')->with('success','You have successfully added a player');
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
        return view('playersunit.show');
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
        return view('playersunit.edit', compact('players'));
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
            'name'=> 'required|max:255',
            'lastname'=> 'required|max:255',
            'email' => 'email|max:255|unique:users'
            //'password' => 'required|string|min:6|confirmed'
        ));
        $players = Player::find($id);
        $players->name = $request->name;
        $players->lastname = $request->lastname;
        $players->email = $request->email;
        $players->save();
        return redirect()->route('playerunits.index')->with('success','You have successfully updated a player');
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
        $players = Player::find($id);
        $class_sub = Class_subscription::where('user_id', '=', $id)->where('is_member', '=', 0);
        if($class_sub)
        {
            foreach ($class_sub as $classkey => $class_s) {
                $class = Classroom::where('classroom_id', '=', $class_s->classroom_id)->first();
                $class->seats_available = $class->seats_available+1;; 
                $class->seats_booked = $class->seats_booked-1;
                $class->save();
            }
            $class_sub->delete();
        }
        $game_sub = Game_subscription::where('user_id', '=', $id)->where('is_member', '=', 0);
        if($game_sub)
        {
            foreach ($game_sub as $gamekey => $game_s) {
                $game = Game::where('game_id', '=', $game_s->game_id)->first();                
                $game->seats_booked = $game->seats_booked-1;
                $game->seats_available = $game->seats_available+1;    
                $game->save();
            }
            $game_sub->delete();
        }
        $series_sub = Series_subscription::where('user_id', '=', $id)->where('is_member', '=', 0)->delete();
        $players->delete(); 

        return redirect()->route('playerunits.index')->with('success','You have successfully deleted Player');
    }
}
