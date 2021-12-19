<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use Illuminate\Support\Facades\Auth;
use App\Class_series;
use App\Series_class;

class Superseries_classController extends Controller
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


    public function editc($id)
    {
        //$id1 = Auth::id();
        $classes = Classroom::find($id);
        //$classes = Classroom::all();
        $series = Class_series::all();
        //dd($classes, $series);
        return view('superseriessub.editc', compact('classes', 'series'));
    }

    public function save(Request $request, $id)
    {
        //dd(request()->all());
        $this->validate($request, array(            
            'series_name'=> 'required|max:255'           
        ));

        if(Series_class::where('classroom_id', '=', $request->class_name)->exists())
        {
            $class_series = Series_class::where('classroom_id', $request->class_name)->first();   
            $series1 =  Class_series::find($class_series->series_id);
            $message = 'class is already enrolled to "'.$series1->name.'" series.';
            return redirect()->back()->with('info', $message);   
        }
        
        $series = $request->series_name;
        if(Series_class::where('series_id', '=', $series)->where('classroom_id', '=', $request->class_name)->where('subscription_status', '=', 1)->exists()) 
        {
            $class_series = Series_class::where('classroom_id', $request->class_name)->first();   
            $series1 =  Class_series::find($class_series->series_id);
            $message = 'class is already enrolled to "'.$series1->name.'" series.';
            return redirect()->back()->with('info', $message);   
        }
        else if(Series_class::where('series_id', '=', $series)->where('classroom_id', '=', $request->class_name)->where('subscription_status', '=', 0)->exists()) 
        {
            $series_sub = Series_class::where('series_id', '=', $id)->where('classroom_id', '=', $request->class_name)->where('subscription_status', '=', 0)->first();
            $series_sub->subscription_status = 1;
            $series_sub->save();
            return redirect()->back()->with('success', 'class is enrolled to series');
        }
        else
        {
            $series_sub = new Series_class;
            $series_sub->series_id = $series;
            $series_sub->classroom_id = $request->class_name;
            $series_sub->subscription_id = uniqid('ss',true);
            $series_sub->subscription_status = true;
            $series_sub->save();    
            return redirect()->back()->with('success', 'class is enrolled to series');
        }
    }






    public function edit($id)
    {
         $series = Class_series::find($id);
        //$classes = Classroom::all();
        $classes = Classroom::leftJoin('series_classes', 'classrooms.classroom_id', '=', 'series_classes.classroom_id')->where('class_status', '=', 1)->select('classrooms.class_name', 'series_classes.subscription_status', 'classrooms.classroom_id')->get();
        return view('superseriessub.edit', compact('classes', 'series'));
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
            'class_name'=> 'required|max:255'           
        ));
        /*$classid = $request->class_name;
        $seriesid = $request->series_name;
        $classes = Classroom::findOrFail($classid);
        $series = Class_series::findOrFail($seriesid);*/

        if(Series_class::where('classroom_id', '=', $request->class_name)->exists())
        {
            $class_series = Series_class::where('classroom_id', $request->class_name)->first();   
            $series1 =  Class_series::find($class_series->series_id);
            $message = 'class is already enrolled to "'.$series1->name.'" series.';
            return redirect()->back()->with('info', $message);   
        }

        if(Series_class::where('series_id', '=', $id)->where('classroom_id', '=', $request->class_name)->where('subscription_status', '=', 1)->exists()) 
        {
            $class_series = Series_class::where('classroom_id', $request->class_name)->first();   
            $series1 =  Class_series::find($class_series->series_id);
            $message = 'class is already enrolled to "'.$series1->name.'" series.';
            return redirect()->back()->with('info', $message);   
        }
        else if(Series_class::where('series_id', '=', $id)->where('classroom_id', '=', $request->class_name)->where('subscription_status', '=', 0)->exists()) 
        {
            $series_sub = Series_class::where('series_id', '=', $id)->where('classroom_id', '=', $request->class_name)->where('subscription_status', '=', 0)->first();
            $series_sub->subscription_status = 1;
            $series_sub->save();
            return redirect()->back()->with('success', 'class is enrolled to series');
        }
        else
        {
            $series_sub = new Series_class;
            $series_sub->series_id = $id;
            $series_sub->classroom_id = $request->class_name;
            $series_sub->subscription_id = uniqid('ss',true);
            $series_sub->subscription_status = true;
            $series_sub->save();    
            return redirect()->back()->with('success', 'class is enrolled to series');
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
