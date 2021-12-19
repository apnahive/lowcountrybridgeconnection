<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Classroom;
use App\Class_category;
use Illuminate\Support\Facades\Auth;
use App\Teacher;
use App\Class_series;
use App\Club;
use App\Series_class;
use App\Class_subscription;
use App\Waitlist_subscription;
use DateTime;
use Image;
use File;
use App\Class_flyer;
use Illuminate\Support\Facades\Storage;

class UnitclassController extends Controller
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
       $classes = Classroom::all();
       foreach ($classes as $key => $class) 
       {
            //dd($class);
            if(Teacher::where('id', $class->teacher_id)->exists())
            {
                $teach = Teacher::where('id', $class->teacher_id)->first();
                $class->teacher = $teach->name;    
            }
            else
            {
                $class->teacher = 'N/A';    
            }            
       } 
       //dd($classes);
       return view('unitclass.index', compact('classes','clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clubs = DB::table('clubs')->get();
        $categories = Class_category::all();        
        $teachers = Teacher::all();
        $series = Class_series::all();
        return view('unitclass.create', compact('clubs', 'categories', 'series', 'teachers')); 
    }
    public function creates($id)
    {
        $series = $id;
        $teachers = Teacher::all();
        $clubs = DB::table('clubs')->get();
        return view('unitclass.creates', compact('clubs', 'series', 'teachers'));  
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
            'class_name'=> 'required|max:25',                        
            'class_description'=> 'required|max:1024',
            'class_from'=> 'required|date|after:today',
            //'class_till'=> 'required|date|after_or_equal:class_from',
            'club'=> 'numeric|min:1',
            'teacher_name'=> 'numeric|min:1',
            //'club'=> 'numeric|min:1',
            'class_size'=> 'numeric|min:2|max:200',
            'payment_option'=> 'required|max:255',
            'class_flyer_address' => 'sometimes|required|mimes:pdf|max:8192'
            
        ));

        //store in database
        $class = new Classroom;

        $class->class_name = $request->class_name;
        $class->club_name = "";        
        $class->class_from = $request->class_from;
        if($request->class_till)
        {
            $class->class_till = $request->class_till;    
        }
        else
        {
            $t = strtotime($request->class_from);
            $class->class_till = date('Y-m-d', strtotime('+10 years', $t));
        }
        $class->class_size = $request->class_size;
        $class->payment_option = $request->payment_option;
        //$class->class_flyer_address = $request->class_flyer_address;
        $class->class_description = $request->class_description;        
        $class->classroom_id = uniqid('cr',true);
        
        $class->teacher_id = $request->teacher_name;

        $class->club_id = $request->club;
        $class->class_status = true;
        $class->class_type = $request->class_type;
        if($request->series_name === 'Choose...')
        {}
        else
        {    
            $class->series_id = $request->series_name;
        }    
        $class->fee_amount = $request->fee_amount;
        $class->start_time = $request->start_time;
        
        $class->seats_available = $request->class_size;
        $class->seats_booked = 0;

        $class->save();
        //dd($class->classroom_id);

        if($request->class_flyer_address)
        {
          $flyer = new Class_flyer;

          $image = $request->file('class_flyer_address');
          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          
          $flyer->class_id = $class->id;
          $flyer->flyer = $input['imagename'];
          $flyer->save();  
          $destinationPath = storage_path('/flyer/class');
          //$img = Image::make($image->getRealPath());
          /*$img->resize(100, 100, function ($constraint) {
              $constraint->aspectRatio();
          })->save($destinationPath.'/'.$input['imagename']);*/

          $destinationPath = storage_path('/flyer/class');
          $image->move($destinationPath, $input['imagename']);
          
        }

        //add class to series code
        if($request->series)
        {
            $series_sub = new Series_class;
            $series_sub->series_id = $request->series;
            $series_sub->classroom_id = $class->classroom_id;
            $series_sub->subscription_id = uniqid('ss',true);
            $series_sub->subscription_status = true;
            $series_sub->save();
            return redirect()->route('unitclass.index')->with('error_code', $request->series); 
        }
        else
        {
            return redirect()->route('unitclass.index')->with('error_codes', $class->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classes = Classroom::find($id);
        $classes->payment_option = str_replace('_', ' ', $classes->payment_option);

        if(Teacher::where('id', $classes->teacher_id)->exists())
        {
            $teach = Teacher::where('id', $classes->teacher_id)->first();
            $classes->teacher = $teach->name;    
        }
        else
        {
            $classes->teacher = 'N/A';    
        }
        $date1 = new DateTime($classes->class_from);
          $date2 = new DateTime($classes->class_till);
          $d = date_diff($date1, $date2);
          if($d->y == 10)
          { 
              $classes->class_till = 'N/A';
          }
          $fly1 = Class_flyer::where('class_id', $id)->first();
      if($fly1)
      {
        $flyer = $fly1->flyer;
      }
      else
      {
        //$fly = null;
        $flyer = null;
      }
        return view('unitclass.show', compact('classes', 'flyer'));
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
        $classes = Classroom::find($id);

        $date1 = new DateTime($classes->class_from);
        $date2 = new DateTime($classes->class_till);
        $d = date_diff($date1, $date2);
        if($d->y == 10)
        { 
            $classes->class_till = null;
        }
        //$classes->class_from = $date1->format('m/d/Y');
        //$classes->class_from1 = $date1->format('m/d/y');
        //dd($classes->class_from);

        $clubs = DB::table('clubs')->get();
        $categories = Class_category::all();        
        $teachers = Teacher::all();
        $series = Class_series::all();

        $fly1 = Class_flyer::where('class_id', $id)->first();
        if($fly1)
        {
        $flyer = $fly1->flyer;
        }
        else
        {
        //$fly = null;
        $flyer = null;
        }

        return view('unitclass.edit', compact('clubs', 'categories', 'series', 'teachers', 'classes', 'flyer'));
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
        //dd(request()->all());
        $this->validate($request, array(
            'class_name'=> 'required|max:25',
            'class_from'=> 'required|date|after:today',
            //'class_till'=> 'sometimes|date|after:today',
            'class_size'=> 'numeric|min:2|max:200',
            'payment_option'=> 'required|max:255',            
            'fee_amount' =>  'required|max:255',
            'class_flyer_address' => 'sometimes|required|mimes:pdf|max:8192'
            
        ));

        //store in database
        $class = Classroom::find($id);

        $class->class_name = $request->input('class_name');
        $class->club_name = "a";
        $class->class_from = $request->input('class_from');

        if($request->input('class_till') > $request->input('class_from'))
        {
            $class->class_till = $request->class_till;    
        }
        else
        {
            $t = strtotime($request->input('class_from'));
            $class->class_till = date('Y-m-d', strtotime('+10 years', $t));            
        }

        $class->class_size = $request->input('class_size');
        $class->payment_option = $request->input('payment_option');
        //$class->class_flyer_address = $request->input('class_flyer_address');
        $class->class_description = $request->input('class_description');
        $class->club_id = $request->club;
        /*$class->class_type = $request->class_type;
        $class->series_id = $request->series_name;*/
        $class->fee_amount = $request->fee_amount;
        $class->start_time = $request->start_time;
        $class->teacher_id = $request->teacher_name;

        $class->save();

        if($request->class_flyer_address)
        {

          /*$this->validate($request, array(
              'image' => 'sometimes|required|mimes:pdf,zip|max:2048'
          ));*/
          
          //dd('flyer entered');
          $flyer = Class_flyer::where('class_id', $id)->first();

          if($flyer == null)
          {
            //dd('new flyer is required');
            $flyer = new Class_flyer;
            $flyer->class_id = $id;
          }
          else
          {
            $file = $flyer->flyer;
            //File::delete('class_flyer/'.$file);
            unlink(storage_path('flyer/class/'.$file));
          }

          $image = $request->file('class_flyer_address');
          
          //dd($image, $request->class_flyer_address);
          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          
          //$flyer->class_id = $class->id;
          $flyer->flyer = $input['imagename'];
          $flyer->save();  
          $destinationPath = storage_path('/flyer/class');
          /*$img = Image::make($image->getRealPath());
          $img->resize(100, 100, function ($constraint) {
              $constraint->aspectRatio();
          })->save($destinationPath.'/'.$input['imagename']);*/

          $destinationPath = storage_path('/flyer/class');
          $image->move($destinationPath, $input['imagename']);
          
        }

        //redirect to other page
        return redirect()->route('unitclass.show',$class->id)->with('success','You have successfully updated the class');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd('class delete hitted');
        $class = Classroom::find($id);
        $class_sub = Class_subscription::where('classroom_id', $class->classroom_id);
        $wait = Waitlist_subscription::where('classroom_id', $class->classroom_id);
        $series_class = Series_class::where('classroom_id', $class->classroom_id);
        $series_class->delete();
        $class_sub->delete();
        $wait->delete();
        $class->delete();  
        return redirect()->route('unitclass.index')->with('success','You have successfully deleted the class');
    }
    public function delete_flyer($id)
    {
      //dd('delete flyer is hitted');
      $flyer = Class_flyer::where('class_id', $id);
      $flyer1 = Class_flyer::where('class_id', $id)->first();
      
      $file = $flyer1->flyer;
      //File::delete('class_flyer/'.$file);
      unlink(storage_path('flyer/class/'.$file));
      //dd($file);
      $flyer->delete();
      return redirect()->route('unitclass.edit', $id)->with('success', 'You have successfully removed the Flyer');

    }

    public function getclass($filename)
    {
      /*$user = Auth::check();
      dd($user);*/
      //$user = Session::get('user');
      //dd($user);
        $fullpath="flyer/class/{$filename}";
        return response()->download(storage_path($fullpath), null, [], null);
    }
}
