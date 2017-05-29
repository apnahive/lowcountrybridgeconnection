<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unitadmin;
use Hash;


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
        return view('superadmin');
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
        return redirect()->route('superadmin')->with('success','You have sucessfully created Unit Admin');
    }
}
