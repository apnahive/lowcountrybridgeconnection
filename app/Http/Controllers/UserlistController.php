<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Manager;
use App\Club;
use App\Classroom;
use App\Class_series;
use Hash;

class UserlistController extends Controller
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
        $teacher = Teacher::all();  
        $clubs = Club::all();

        foreach ($teacher as $key => $value) {
            if(Classroom::where('teacher_id', $value->id)->exists())
            {
                $value->active = 0;
            }
            elseif(Class_series::where('teacher_id', $value->id)->exists())
            {
                $value->active = 0;
            }
            else
            {
                $value->active = 1;
            }
        }

        //dd($teacher);
        return view('userlist.index', compact('teacher','clubs')); 
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
        $teacher = Teacher::findOrFail($id);     
        return view('userlist.edit', compact('teacher'));  
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
        if ($request->input('name'))
        {
          $this->validate($request, array(
           'name'=> 'required|max:255',            
            ));
          $teacher = Teacher::findOrFail($id);
          $teacher->name = $request->input('name');
          $teacher->save();
        }
        else {
         $this->validate($request, array(           
           'old_password' => 'required|string|min:6',
           'new_password' => 'required|string|min:6',
           'password_confirmation' => 'required|string|same:new_password',
        ));

        $teacher = Teacher::findOrFail($id);
        $old_password = $request->old_password;
        $cpassword = $teacher->password;
        if (Hash::check($old_password, $cpassword)) {
            //store in database
            $teacher->password = Hash::make($request->new_password);
            $teacher->save();
          }
        }    

        //redirect to other page
        return redirect()->route('userlist.index')->with('success','You have successfully updated teacher details'); 

    }


    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id)->delete();
        //$clubs->delete();
        return redirect()->route('userlist.index')->with('success','You have successfully deleted teacher');
    }
    
}
