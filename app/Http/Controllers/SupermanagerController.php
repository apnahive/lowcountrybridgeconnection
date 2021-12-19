<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manager;
use App\Club;
use App\Game;
use Hash; 

class SupermanagerController extends Controller
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
        $manager = Manager::all();  
        $clubs = Club::all();
        foreach ($manager as $key => $value) {
            if(Game::where('manager_id', $value->id)->exists())
            {
                $value->active = 0;
            }            
            else
            {
                $value->active = 1;
            }
        }
        return view('supermanager.index', compact('clubs'), compact('manager')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubs = Club::all();  
        return view('supermanager.create', compact('clubs'));
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
        $manager = new Manager;
        //$request->merge(['password' => Hash::make($request->password)]);

        $manager->name = $request->name;
        $manager->email = $request->email;
        $manager->password = Hash::make($request->password);
        $manager->club_id = $request->club_name;

        $manager->save();

        //redirect to other page
        return redirect()->route('supermanager.index')->with('success','You have successfully created a manager');
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
        $manager = Manager::findOrFail($id);     
        return view('supermanager.edit',  compact('manager')); 
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
          $manager = Manager::findOrFail($id);
          $manager->name = $request->input('name');
          $manager->save();
        }
        else {
         $this->validate($request, array(           
           'old_password' => 'required|string|min:6',
           'new_password' => 'required|string|min:6',
           'password_confirmation' => 'required|string|same:new_password',
        ));

        $manager = Manager::findOrFail($id);
        $old_password = $request->old_password;
        $cpassword = $manager->password;
        if (Hash::check($old_password, $cpassword)) {
            //store in database
            $manager->password = Hash::make($request->new_password);
            $manager->save();
          }
        }    

        //redirect to other page
        return redirect()->route('supermanager.index')->with('success','You have successfully updated manager details'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manager = Manager::find($id)->delete();
        //$clubs->delete();
        return redirect()->route('supermanager.index')->with('success','You have successfully deleted manager');
    }
}
