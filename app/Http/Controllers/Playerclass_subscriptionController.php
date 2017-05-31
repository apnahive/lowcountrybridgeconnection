<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Player;
use App\Class_subscription;
use App\Classroom;

class Playerclass_subscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $classes = Classroom::where('seats_available', '>=', 1)->get();
        return view('playerclass.edit', compact('players'), compact('classes'));
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
        //dd(request()->all());
        $classid = $request->class_name;
        $classes = Classroom::findOrFail($classid);
        //$a = $classes->seats_booked;
        if($classes->seats_available)
        {
           
            $class_sub = new Class_subscription;
            $class_sub->classroom_id = $classes->classroom_id;
            $class_sub->user_id = $id;
            $class_sub->subscription_id = uniqid('sb',true);
            $class_sub->subscription_status = true;
            $class_sub->is_member = false;

            $classes->seats_booked = $classes->seats_booked+1;
            $classes->seats_available = $classes->seats_available-1;
            $classes->save();


            $class_sub->save();
            return redirect()->route('players.index')->with('success','You have sucessfully subscribed the class'); 
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
        //
    }
}
