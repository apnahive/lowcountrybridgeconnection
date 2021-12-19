<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Teacher;
use App\Manager;
use Hash;
use App\Club;
use App\Unitadmin;

class UnitadminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:unitadmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $user = Auth::user();
        return view('unitadmins.index',  ['user' => $user]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubs = Club::all();  
        return view('unitadmins.create', compact('clubs')); 
    }
    public function create1()
    {
        $clubs = Club::all();  
        return view('unitadmins.createm', compact('clubs')); 
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
            'name'=> 'required|max:255',
            'email' => 'required|string|email|max:255|unique:users', 
            'password' => 'required|string|min:6'

        ));

        //store in database
        $teacher = new Teacher;
        //$request->merge(['password' => Hash::make($request->password)]);

        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = Hash::make($request->password);
        //$teacher->club_id = $request->club_name;

        $teacher->save();

        //redirect to other page
        return redirect()->route('unitadmins.index')->with('success','You have successfully created a teacher');

    }
    public function store1(Request $request)
    {
        //dd(request()->all());
        //validate the data
        $this->validate($request, array(
            'name'=> 'required|max:255',
            'email' => 'required|string|email|max:255|unique:users', 
            'password' => 'required|string|min:6'
        ));

        //store in database
        $manager = new Manager;
        //$request->merge(['password' => Hash::make($request->password)]);

        $manager->name = $request->name;
        $manager->email = $request->email;
        $manager->password = Hash::make($request->password);
        $manager->club_id = $request->club_name;

        $manager->save();

        //redirect to other page
        return redirect()->route('unitadmins.index')->with('success','You have successfully created a manager');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('unitadmins.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unitadmin = Unitadmin::findOrFail($id);     
        return view('unitadmins.edit', ['unitadmin' => $unitadmin]); 
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
        if ($request->input('name'))
        {
          $this->validate($request, array(
           'name'=> 'required|max:255',            
            ));
          $unitadmin = Unitadmin::findOrFail($id);
          $unitadmin->name = $request->input('name');
          $unitadmin->save();
        }
        else {
             $this->validate($request, array(           
               'old_password' => 'required|string|min:6',
               'new_password' => 'required|string|min:6',
               'password_confirmation' => 'required|string|same:new_password',
            ));

            $unitadmin = Unitadmin::findOrFail($id);
            $old_password = $request->old_password;
            $cpassword = $unitadmin->password;
            if (Hash::check($old_password, $cpassword)) {
                //store in database
                $unitadmin->password = Hash::make($request->new_password);
                $unitadmin->save();
              }
        }    

        //redirect to other page
        return redirect()->route('unitadmins.index')->with('success','You have successfully updated unitadmin details'); 
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
