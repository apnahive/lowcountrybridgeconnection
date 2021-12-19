<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unitadmin;
use Hash; 

class SuperunitController extends Controller
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
         $unitadmins = Unitadmin::all();  
         
        //$clubs = Club::all();
        return view('superunit.index', compact('unitadmins')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superunit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name'=> 'required|max:255',
            'email' => 'required|string|email|max:255|unique:users', 
            'password' => 'required|string|min:6'
        ));

        //store in database
        $unitadmin = new Unitadmin;
        //$request->merge(['password' => Hash::make($request->password)]);

        $unitadmin->name = $request->name;
        $unitadmin->email = $request->email;
        $unitadmin->password = Hash::make($request->password);
        //$unitadmin->club_id = $request->club_name;

        $unitadmin->save();

        //redirect to other page
        return redirect()->route('superunit.index')->with('success','You have successfully created a unitadmin');
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
        $unitadmin = Unitadmin::findOrFail($id);     
        return view('superunit.edit', compact('unitadmin'));
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
        return redirect()->route('superunit.index')->with('success','You have successfully updated unitadmin details'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unitadmin = Unitadmin::find($id)->delete();
        //$clubs->delete();
        return redirect()->route('superunit.index')->with('success','You have successfully deleted unitadmin');
    }
}
