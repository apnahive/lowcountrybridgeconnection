<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Manager;
use App\Club;
use App\Game;
use Hash; 

class UnitmanagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:unitadmin');
    }
    
    public function index()
    {
        //        
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
        return view('usermanager.index', compact('clubs'), compact('manager')); 
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
       $manager = Manager::findOrFail($id);     
        return view('usermanager.edit',  compact('manager'));   
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
        return redirect()->route('unitmanager.index')->with('success','You have successfully updated manager details'); 
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
        return redirect()->route('unitmanager.index')->with('success','You have successfully deleted manager');
    }
}
