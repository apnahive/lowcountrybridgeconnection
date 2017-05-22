<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Classroom;
use App\Class_subscription;
use Illuminate\Support\Facades\Auth;

class Class_subscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    
    { 
        $id1 = Auth::id();
        $classes = Classroom::all();
        $class_subscription = Class_subscription::where('user_id', $id1)->get(); 
        return view('subscription.index', compact('classes'), compact('class_subscription'));        
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
        return view('subscription.show', ['classes' => Classroom::findOrFail($id)]);
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
        //if subscription_status is true
        $sub = Class_subscription::find($id);
        
        $sub->subscription_status = false;

        $sub->save();
        
        //find classroom_id from class_subscriptions table
        $classroom_id = $sub->classroom_id;
        //find classroom_id from classroom table
        $class2 = Classroom::where('classroom_id', $classroom_id)->first();

        //Update classroom table for seats available and seats booked
        
        $class2->seats_booked = $class2->seats_booked-1;
        $class2->seats_available = $class2->seats_available+1;
        $class2->save();
       // $class1 = Classroom::findOrFail($class->id);
        //$class->seats_booked = $class->seats_booked-1;
        //$class->seats_available = $class->seats_available+1;
        //$class->save();

      //  notify()->flash('Deleted','error',['text' => 'Word Deleted Succesfully']);
       // return view('subscription.show');
        $id1 = Auth::id();
        $classes = Classroom::all();
        $class_subscription = Class_subscription::where('user_id', $id1)->get(); 
        return view('subscription.index', compact('classes'), compact('class_subscription'));        
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
        $classes = Classroom::findOrFail($id);
        //$a = $classes->seats_booked;
        $classes->seats_booked = $classes->seats_booked+1;
        $classes->seats_available = $classes->seats_available-1;
        $classes->save();

        $class_sub = new Class_subscription;
        $id1 = Auth::id();

        $class_sub->classroom_id = $classes->classroom_id;
        $class_sub->user_id = $id1;
        $class_sub->subscription_id = uniqid('sb',true);
        $class_sub->subscription_status = true;

        $class_sub->save();

        //
        return redirect()->route('classlist'); 
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

    public function cancelsubscription(Request $request, $id)
    {
        dd(request()->all());   
        $sub = Class_subscription::find($id);
        
        $sub->subscription_status = false;

        $sub->save();

        notify()->flash('Deleted','error',['text' => 'Word Deleted Succesfully']);
        return redirect('subscription.index');
        //
    }
    
}
