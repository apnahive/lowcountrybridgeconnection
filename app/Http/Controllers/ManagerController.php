<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Manager;
use Hash;

class ManagerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:manager');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


     public function index()
    {
        $user = Auth::user();
        return view('manager.index',  ['user' => $user]);
    }

    public function edit($id)
    {
         $manager = Manager::findOrFail($id);     
         return view('manager.edit', ['manager' => $manager]);        
    }
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
        return redirect()->route('manager.index')->with('success','You have sucessfully updated manager details'); 
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
        $manager = new Manager;
        //$request->merge(['password' => Hash::make($request->password)]);

        $manager->name = $request->name;
        $manager->email = $request->email;
        $manager->password = Hash::make($request->password);

        $manager->save();

        //redirect to other page
        return redirect()->route('unitadmin.index')->with('success','You have sucessfully created the manager');
    }

}
