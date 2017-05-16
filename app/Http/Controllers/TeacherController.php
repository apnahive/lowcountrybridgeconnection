<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Teacher;
use Hash;

class TeacherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    /**
     * Show the application dashboard. 
     *
     * @return \Illuminate\Http\Response
     */   
    public function index()
    {
        $user = Auth::user();
        return view('teacher.index',  ['user' => $user]);
    }

    public function edit($id)
    {
         $teacher = Teacher::findOrFail($id);     
         return view('teacher.edit', ['teacher' => $teacher]);        
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, array(
           'name'=> 'required|max:255', 
           'old_password' => 'required|string|min:6',
           'new_password' => 'required|string|min:6',
           'password_confirmation' => 'required|string|same:new_password',
        ));

        $teacher = Teacher::findOrFail($id);
        $old_password = $request->old_password;
        $cpassword = $teacher->password;
        if (Hash::check($old_password, $cpassword)) {
            //store in database
            
            //$teacher1 = validator($teacher);

            $teacher->name = $request->input('name');
            $teacher->password = Hash::make($request->new_password);
            
            

            $teacher->save();
        }    
        

        //redirect to other page
        return redirect()->route('teacher.index'); 
    }
    public function store(Request $request)
    {
        //dd(request()->all());
        //validate the data
        $this->validate($request, array(
            'name'=> 'required|max:255',
            'email' => 'required|string|email|max:255|unique:users', 
            //'password' => 'required|string|min:6|confirmed'
        ));

        //store in database
        $teacher = new Teacher;
        //$request->merge(['password' => Hash::make($request->password)]);

        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = Hash::make($request->password);

        $teacher->save();

        //redirect to other page
        return redirect()->route('unitadmin.index');
    }

}
