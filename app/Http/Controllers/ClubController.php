<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;
use App\Club_membership;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Datatables;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Classroom;
use App\Game;
use App\Class_subscription;
use App\Waitlist_subscription;
use App\Game_subscription;
use App\Game_waitlist_subscription;
use App\Series_class;
use App\Manager;
use App\Series_subscription;
use App\Class_series;
use App\Club_subscription;



class ClubController extends Controller
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
        $clubs = Club::all();  
       return view('clubs.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clubs.create'); 
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
        //validate the data
        $this->validate($request, array(
            'club_name'=> 'required|max:255',
            'city' =>'required|max:255',
            //'club_website' =>'required|max:255',
            'first_name' =>'required|max:255',
            'last_name' =>'required|max:255',
            'email' =>'required|max:255'
        ));

        //store in database
        $club = new Club;
        $id1 = Auth::id();

        $club->club_name = $request->club_name;
        $club->city = $request->city;
        //$club->club_website = $request->club_website;
        $club->first_name = $request->first_name;
        $club->last_name = $request->last_name;
        $club->email = $request->email;
        $club->created_by = $id1;
        $club->update_code = "unit";

        $club->save();
        $name = $request->club_name;

        
        /*$name = strtolower($name);
        
        $name = preg_replace("/[^a-z0-9_\s-]/", "", $name);
        
        $name = preg_replace("/[\s-]+/", " ", $name);
        
        $name = preg_replace("/[\s_]/", "_", $name);


        

        Schema::table('club_memberships', function (Blueprint $table) use ($name)
        {
            $table->boolean($name);    
        });*/

        /*Schema::connection('mysql')->create('club_membership', function($table)
        {
            $table->string($name);
        });*/

        //redirect to other page
        return redirect()->route('clubs.index')->with('success','You have successfully created club');
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
        $clubs = Club::find($id);
        
        return view('clubs.edit', ['clubs' => $clubs]);
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
            'club_name'=> 'required|max:255',
            'city'=> 'required|max:255'            
        ));

        $clubs = Club::find($id);

        $clubs->club_name = $request->input('club_name');
        $clubs->city = $request->input('city');
        //$clubs->club_website = $request->club_website;
        $clubs->first_name = $request->first_name;
        $clubs->last_name = $request->last_name;
        $clubs->email = $request->email;
        $clubs->save();
        return redirect()->route('clubs.index')->with('success','You have successfully updated club');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $clubs = Club::find($id);
        //$clubs->delete();
        $classes = Classroom::where('club_id', '=', $id);
        foreach ($classes as $classkey => $class) {
            $class_sub = Class_subscription::where('classroom_id', '=', $class->classroom_id);
            $waitlist = Waitlist_subscription::where('classroom_id', '=', $class->classroom_id);            
            $class_sub->delete();
            $waitlist->delete();
        }
        $classes->delete();

        $series = Class_series::where('club_id', '=', $id);
        foreach ($series as $serieskey => $value) {
            $classes1 = Classroom::where('classroom_id', '=', $value->classroom_id);
            foreach ($classes1 as $classkey => $class) {
                $class_sub = Class_subscription::where('classroom_id', '=', $class->classroom_id);
                $waitlist = Waitlist_subscription::where('classroom_id', '=', $class->classroom_id);            
                $class_sub->delete();
                $waitlist->delete();
            }
            $classes1->delete();  
            $series_sub = Series_subscription::where('series_id', '=', $value->id);
            $series_sub->delete();
            $series_class = Series_class::where('series_id', '=', $value->id);
            $series_class->delete();
        }

        $games = Game::where('club_id', '=', $id);
        foreach ($games as $gamekey => $game) {
            $class_sub = Game_subscription::where('game_id', '=', $game->game_id);
            $waitlist = Game_waitlist_subscription::where('game_id', '=', $game->game_id);            
            $class_sub->delete();
            $waitlist->delete();
        }
        $games->delete();

        $managers = Manager::where('club_id', '=', $id);
        $managers->delete();

        //club subscription
        $club_sub = Club_subscription::where('club_id', '=', $id);
        if($club_sub)
        {
            $club_sub->delete();
        }


        $clubs->delete();


        return redirect()->route('clubs.index')->with('success','You have successfully deleted club');
    }
}
