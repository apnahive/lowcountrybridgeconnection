<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Waitlist_subscription;
use App\Classroom;
use App\User;
use Mail;
use App\Mail\Classopenslot;

class Unit_classwaitController extends Controller
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
        $classes = Classroom::findOrFail($id);        
        $classid = $classes->classroom_id;
        $users = User::all();

        $waiting = Waitlist_subscription::where('classroom_id', '=', $classid)->get();
        return view('unitclasswait.show', compact('waiting', 'users', 'classes', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $waiting = Waitlist_subscription::find($id);
        $member = User::find($waiting->user_id);
        //dd($member);
        $class = Classroom::where('classroom_id', '=', $waiting->classroom_id)->first();
        //dd($class);
        Mail::to($member->email)->send(new Classopenslot($class, $member));  
        return redirect()->route('unitadmins.index')->with('success','You have successfully send the mail to the registered member.');
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
