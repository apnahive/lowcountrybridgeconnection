<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Classroom;
use App\Class_category;
use Illuminate\Support\Facades\Auth;


class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:teacher');
    }
    
    public function index()
    {
        //$clubs = DB::table('clubs')->get();
        //view('classin',  ['clubs' => $clubs]); 
       $classes = Classroom::all();  
       return view('classes.index', compact('classes'));

        //return view('classes.index')->with('classes', $classes);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $clubs = DB::table('clubs')->get();
         $categories = Class_category::all();
        return view('classes.create',  ['clubs' => $clubs],  ['categories' => $categories]); 
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
            'class_name'=> 'required|max:255',            
            'club_name'=> 'required|max:255',
            'class_description'=> 'required|max:1024',
            'class_from'=> 'required|date|before_or_equal:class_till',
            'class_till'=> 'required|date|after_or_equal:class_from',
            'class_size'=> 'numeric|min:2|max:200',
            'payment_option'=> 'required|max:255',
            'class_flyer_address'=> 'required|max:255',
            'category_name' => 'required|max:255'
        ));

        //store in database
        $class = new Classroom;

        $class->class_name = $request->class_name;
        $class->club_name = $request->club_name;
        $class->category_name = $request->category_name;
        $class->class_from = $request->class_from;
        $class->class_till = $request->class_till;
        $class->class_size = $request->class_size;
        $class->payment_option = $request->payment_option;
        $class->class_flyer_address = $request->class_flyer_address;
        $class->class_description = $request->class_description;
        $class->club_id = "2";
        $class->classroom_id = uniqid('cr',true);
        $id1 = Auth::id();
        $class->teacher_id = $id1;
        $class->class_status = true;
        
        $class->seats_available = $request->class_size;
        $class->seats_booked = 0;
        $class->save();

        //redirect to other page
        return redirect()->route('classes.show',$class->id)->with('success','You have sucessfully created the class');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)    
    {
        //$classes as $classkey => $value
       return view('classes.show', ['classes' => Classroom::findOrFail($id)]);
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
        //$classes = DB::table('classrooms')->where('id', $id);
        //$classes = Classroom::all();
        //$clubs = Club::all(); 
        $classes = Classroom::find($id);
        $clubs = DB::table('clubs')->get();
        $categories = DB::table('class_categories')->get();
        return view('classes.edit', ['classes' => $classes], ['categories' => $categories, 'clubs' => $clubs]);
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
          //validate the data
        $this->validate($request, array(
            'class_name'=> 'required|max:255',            
            'club_name'=> 'required|max:255',
            'class_from'=> 'required|date|before_or_equal:class_till',
            'class_till'=> 'required|date|after_or_equal:class_from',
            'class_size'=> 'numeric|min:2|max:200',
            'payment_option'=> 'required|max:255',
            'class_flyer_address'=> 'required|max:255',
            'category_name' => 'required|max:255'
        ));

        //store in database
        $class = Classroom::find($id);

        $class->class_name = $request->input('class_name');
        $class->club_name = $request->input('club_name');
        $class->class_from = $request->input('class_from');
        $class->class_till = $request->input('class_till');
        $class->class_size = $request->input('class_size');
        $class->payment_option = $request->input('payment_option');
        $class->class_flyer_address = $request->input('class_flyer_address');
        $class->class_description = $request->input('class_description');
        $class->category_name = $request->category_name;
        

        $class->save();

        //redirect to other page
        return redirect()->route('classes.show',$class->id)->with('success','You have sucessfully updated the class');
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
