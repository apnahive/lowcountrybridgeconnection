<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Club_subscription;
use App\Club_membership;
use App\Club;
use App\User;
use Illuminate\Support\Facades\Schema;

class Club_subscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $clubs = Club::all(); 
        $id1 = Auth::id(); 
        $sub = Club_subscription::where('user_id', '=', $id1)->get();
        return view('clubsub.index', compact('clubs', 'sub', 'users'));
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
        $id1 = Auth::id();
        $club = Club::find($id);
        $name = $club->club_name;
        $name = strtolower($name);
        //Make alphanumeric (removes all other characters)
        $name = preg_replace("/[^a-z0-9_\s-]/", "", $name);
        //Clean up multiple dashes or whitespaces
        $name = preg_replace("/[\s-]+/", " ", $name);
        //Convert whitespaces and underscore to dash
        $name = preg_replace("/[\s_]/", "_", $name);

        if(Schema::hasColumn('club_memberships', $name))  //check whether users table has email column
        {
            $check = Club_membership::where('user_id', $id1)->first();
            if($check[$name] == true)
            {
                return redirect()->route('club_subscription.index')->with('info','You are already enrolled in the club.'); 
            }
            if(!$check)
            {
                $sub = new Club_membership;            
                $sub->user_id = $id1; 
                $sub->$name = true;
                $sub->save();
                return redirect()->route('club_subscription.index')->with('success','You are enrolled in the club.'); 
            }
            else
            {
                return redirect()->route('club_subscription.index');
            }

        }
        else
        {
            return redirect()->route('club_subscription.index')->with('error','Club not found'); 
        }


        /*$id1 = Auth::id();
        $check = Club_membership::where('user_id', $id1)->first();
        if(!$check)
        {
            $sub = new Club_membership;            
            $sub->user_id = $id1;
            $club = Club::find($id);
            $name = $club->club_name;
            $name = strtolower($name);
            //Make alphanumeric (removes all other characters)
            $name = preg_replace("/[^a-z0-9_\s-]/", "", $name);
            //Clean up multiple dashes or whitespaces
            $name = preg_replace("/[\s-]+/", " ", $name);
            //Convert whitespaces and underscore to dash
            $name = preg_replace("/[\s_]/", "_", $name);
    
            $sub->test_club

            if(Schema::hasColumn('club_memberships', $name))  //check whether users table has email column
            {
                
            }
            else
            {
                return redirect()->route('club_subscription.index')->with('error','Club not found'); 
            }
            
            $sub->save();
            return redirect()->route('club_subscription.index')->with('info','You have subscribed the club'); 
        }
        else
        {
            return redirect()->route('club_subscription.index')->with('info','You have already subscribed the club'); 
        }*/

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
