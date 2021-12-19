<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unitadmin;
use App\Superadmin;
use Hash;
use Illuminate\Support\Facades\Auth;

class SuperadminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:superadmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('superadmins.index', compact('user'));
    }
    public function store(Request $request)
    {
      $this->validate($request, array(
            'name'=> 'required|max:255',
            'email' => 'required|string|email|max:255|unique:users', 
            //'password' => 'required|string|min:6|confirmed'
        ));

        //store in database
        $unitadmin = new Unitadmin;
        //$request->merge(['password' => Hash::make($request->password)]);

        $unitadmin->name = $request->name;
        $unitadmin->email = $request->email;
        $unitadmin->password = Hash::make($request->password);

        $unitadmin->save();

        //redirect to other page
        return redirect()->route('superadmin')->with('success','You have successfully created Unit Admin');
    }
    public function edit($id)
    {
        $superadmin = Superadmin::findOrFail($id);     
        return view('superadmins.edit', compact('superadmin')); 
    }
    public function update(Request $request, $id)
    {
        //dd(request()->all());
        if ($request->input('name'))
        {
          $this->validate($request, array(
           'name'=> 'required|max:255',            
            ));
          $superadmin = Superadmin::findOrFail($id);
          $superadmin->name = $request->input('name');
          $superadmin->save();
        }
        else {
             $this->validate($request, array(           
               'old_password' => 'required|string|min:6',
               'new_password' => 'required|string|min:6',
               'password_confirmation' => 'required|string|same:new_password',
            ));

            $superadmin = Superadmin::findOrFail($id);
            $old_password = $request->old_password;
            $cpassword = $superadmin->password;
            if (Hash::check($old_password, $cpassword)) {
                //store in database
                $superadmin->password = Hash::make($request->new_password);
                $superadmin->save();
              }
        }    

        //redirect to other page
        return redirect()->route('superadmins.index')->with('success','You have successfully updated superadmin details'); 
    }
    public function show($id)
    {
        return view('superadmins.show');
    }

}
