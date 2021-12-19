<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Class_subscription;
use App\Classroom;
use App\Class_series;
use App\Series_subscription;
use App\Waitlist_subscription;
use Illuminate\Support\Facades\Auth;

class SuperuserclassController extends Controller
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
        $user = User::find($id);
        $classes = Classroom::where('class_status', '=', 1)->where('seats_available', '>=', 1)->get();
        $series = Class_series::select('id', 'name')->get();
        //dd($classes);
        return view('superuserclass.edit', compact('user', 'series'), compact('classes'));
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
        if($request->class_name)
        {
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
                $class_sub->is_member = true;

                $classes->seats_booked = $classes->seats_booked+1;
                $classes->seats_available = $classes->seats_available-1;
                $classes->save();


                $class_sub->save();
                return redirect()->route('superplayers.index')->with('success','You have successfully enrolled the class'); 
                //->with('success','You have sucessfully subscribed the class')
            }
        }
        else if($request->series_name)
        {
            

            if(Series_subscription::where('user_id', '=', $id)->where('series_id', '=', $request->series_name)->where('is_member', '=', 1)->exists())
            {
                return redirect()->back()->with('info', 'Series is already subscribed');
            }
            else
            {


                $series = new Series_subscription;
                $series->user_id = $id;
                $series->subscription_id = uniqid('ser',true);
                $series->series_id = $request->series_name;
                $series->subscription_status = true;
                $series->is_member = true;
                $series->save();

                $message = 'Series Successfully subscribed. Except these classes, '; 

                $classes = Classroom::leftJoin('series_classes', 'classrooms.classroom_id', '=', 'series_classes.classroom_id')->where('series_classes.series_id', $request->series_name)->select('classrooms.class_name', 'series_classes.subscription_status', 'classrooms.classroom_id', 'classrooms.id', 'classrooms.seats_available', 'classrooms.seats_booked', 'classrooms.teacher_id')->get();

                $already_subscribed = 0;
                $subscribed = 0;
                $waiting = 0;
                foreach ($classes as $classkey => $class)
                {
                    //$id1 = Auth::id();
                    /*$test = Class_subscription::where('user_id', '=', $id)->where('is_member', '=', 0)->where('classroom_id', '=', $class->classroom_id)->get();
                    dd($test);*/
                    if(Class_subscription::where('user_id', '=', $id)->where('is_member', '=', 0)->where('classroom_id', '=', $class->classroom_id)->exists())
                    {
                        $already_subscribed ++;
                        //$message .= $class->class_name.', ';
                        //dd($message);
                    }
                    else
                    {

                        if($class->seats_available)
                        {
                           
                            $class_sub = new Class_subscription;
                            //$id1 = Auth::id();

                            $class_sub->classroom_id = $class->classroom_id;
                            $class_sub->user_id = $id;
                            $class_sub->subscription_id = uniqid('sb',true);
                            $class_sub->subscription_status = true;
                            $class_sub->is_member = true;

                            $class->seats_booked = $class->seats_booked+1;
                            $class->seats_available = $class->seats_available-1;
                            $class->save();          


                            $class_sub->save();
                            if(!$class->seats_available)
                            {
                                $teach = $class->teacher_id;
                                $teacher = Teacher::findOrFail($teach);
                                Mail::to($teacher->email)->send(new Classfull($teacher, $class));
                            }
                            $subscribed++;
                            //->with('success','You have sucessfully subscribed the class')
                        }
                        else
                        {
                            //waiting code
                        }
                    }
                } 

                $message = 'Series Successfully enrolled. Except '.$already_subscribed.' classes as they are already subscribed';
                
                return redirect()->back()->with('success', $message); 
            }
        }
        else
        {
            //dd("none selected");
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
