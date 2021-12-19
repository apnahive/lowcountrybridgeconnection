<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Class_series;
use App\Teacher;
use App\Club;
use App\Classroom;
use Illuminate\Support\Facades\Auth;
use App\Series_class;
use App\Series_subscription;
use DateTime;
use App\Series_flyer;
use File;

class UnitseriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:unitadmin');
    }
    
    public function index()
    {
        //
        $series = Class_series::all(); 
        
       return view('unitseries.index', compact('series', 'teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        $clubs = Club::all();
        return view('unitseries.create', compact('teachers', 'clubs'));
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
            'series_name'=> 'required|max:20',
            'description'=> 'required|max:1024',
            'start_date'=> 'required|date|after:today',
            //'end_date'=> 'required|date|after_or_equal:start_date',
            'club'=> 'numeric|min:1',
            'teacher_name'=> 'numeric|min:1',
            'class_size'=> 'numeric|min:2|max:200',
            'payment_option'=> 'required|max:255',
            'series_flyer' => 'sometimes|required|mimes:pdf|max:8192'          
        ));

        $series = new Class_series;
        $series->name = $request->series_name;
        $series->description = $request->description;
        $series->start_date = $request->start_date;
        if($request->end_date)
        {
            $series->end_date = $request->end_date;    
        }
        else
        {
            $t = strtotime($request->start_date);
            $series->end_date = date('Y-m-d', strtotime('+10 years', $t));
        }
        //$series->end_date = $request->end_date;
        $series->class_size = $request->class_size;
        $series->payment_option = $request->payment_option;
        //$series->series_flyer = $request->series_flyer;
        $series->start_time = $request->start_time;

        $series->fee_amount = $request->fee_amount;
        

        $series->teacher_id = $request->teacher_name;
        $series->club_id = $request->club;

        $series->save();

        if($request->series_flyer)
        {
          $flyer = new Series_flyer;

          $image = $request->file('series_flyer');
          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          
          $flyer->series_id = $series->id;
          $flyer->flyer = $input['imagename'];
          $flyer->save();  
          $destinationPath = storage_path('/flyer/series');
          //$img = Image::make($image->getRealPath());
          /*$img->resize(100, 100, function ($constraint) {
              $constraint->aspectRatio();
          })->save($destinationPath.'/'.$input['imagename']);*/

          $destinationPath = storage_path('/flyer/series');
          $image->move($destinationPath, $input['imagename']);
          
        }

        return redirect()->route('unitseries.index')->with('error_code', $series->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classes = Classroom::leftJoin('series_classes', 'classrooms.classroom_id', '=', 'series_classes.classroom_id')->where('series_classes.series_id', $id)->select('classrooms.class_name', 'series_classes.subscription_status', 'classrooms.classroom_id', 'classrooms.id')->get();
        //dd($classes);
        $series = Class_series::find($id);
        return view('unitseries.show', compact('classes', 'series'));
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
        $series = Class_series::find($id);
        $teachers = Teacher::all();
        $clubs = Club::all();

        $date1 = new DateTime($series->start_date);
        $date2 = new DateTime($series->end_date);
        $d = date_diff($date1, $date2);
        if($d->y == 10)
        { 
            $series->end_date = null;
        }
        $fly1 = Series_flyer::where('series_id', $id)->first();
        //$classes->flyer = $fly->flyer;
        if($fly1)
        {
          $flyer = $fly1->flyer;
        }
        else
        {
          //$fly = null;
          $flyer = null;
        }

        return view('unitseries.edit', compact('series', 'teachers', 'clubs', 'flyer'));
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
        $this->validate($request, array(
            'series_name'=> 'required|max:20',
            'description'=> 'required|max:1024',
            'start_date'=> 'required|date|after:today',
            //'end_date'=> 'required|date|after_or_equal:start_date',
            'class_size'=> 'numeric|min:2|max:200',
            'payment_option'=> 'required|max:255',
            'series_flyer' => 'sometimes|required|mimes:pdf|max:8192'          
        ));

        $series = Class_series::find($id);

        $series->name = $request->series_name;
        $series->description = $request->description;
        $series->start_date = $request->start_date;
        //$series->end_date = $request->end_date;
        if($request->input('end_date') > $request->input('start_date'))
        {
            $series->end_date = $request->end_date;    
        }
        else
        {
            $t = strtotime($request->start_date);
            $series->end_date = date('Y-m-d', strtotime('+10 years', $t));
        }
        $series->class_size = $request->class_size;
        $series->payment_option = $request->payment_option;
        $series->series_flyer = $request->series_flyer;
        $series->start_time = $request->start_time;
        $series->club_id = $request->club;
        $series->teacher_id = $request->teacher_name;
        $series->fee_amount = $request->fee_amount;

        $series->save();

        if($request->series_flyer)
        {

          /*$this->validate($request, array(
              'image' => 'sometimes|required|mimes:pdf,zip|max:2048'
          ));*/
          
          //dd('flyer entered');
          $flyer = Series_flyer::where('series_id', $id)->first();

          if($flyer == null)
          {
            //dd('new flyer is required');
            $flyer = new Series_flyer;
            $flyer->series_id = $id;
          }
          else
          {
            $file = $flyer->flyer;
            //File::delete('series_flyer/'.$file);
            unlink(storage_path('flyer/series/'.$file));
          }

          $image = $request->file('series_flyer');
          
          //dd($image, $request->class_flyer_address);
          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          
          //$flyer->class_id = $class->id;
          $flyer->flyer = $input['imagename'];
          $flyer->save();  
          $destinationPath = storage_path('/flyer/series');
          

          $destinationPath = storage_path('/flyer/series');
          $image->move($destinationPath, $input['imagename']);
          
        }

        return redirect()->route('unitseries.index')->with('success','You have successfully updated the series');
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
        $series = Class_series::find($id)->delete();
        //$clubs->delete();
        $series_classes = Series_class::where('series_id', '=', $id);
        $series_sub = Series_subscription::where('series_id', '=', $id);
        $series_classes->delete();
        $series_sub->delete();
        return redirect()->route('unitseries.index')->with('success','You have successfully deleted Series');
    }

    public function delete_flyer($id)
    {
      //dd('delete flyer is hitted');
      $flyer = Series_flyer::where('series_id', $id);
      $flyer1 = Series_flyer::where('series_id', $id)->first();
      
      $file = $flyer1->flyer;
      //File::delete('series_flyer/'.$file);
      unlink(storage_path('flyer/series/'.$file));
      //dd($file);
      $flyer->delete();
      return redirect()->route('unitseries.edit', $id)->with('success', 'You have successfully removed the Flyer');

    }

    public function getseries($filename)
    {
      /*$user = Auth::check();
      dd($user);*/
      //$user = Session::get('user');
      //dd($user); 
        $fullpath="flyer/series/{$filename}";
        return response()->download(storage_path($fullpath), null, [], null);
    }
}
