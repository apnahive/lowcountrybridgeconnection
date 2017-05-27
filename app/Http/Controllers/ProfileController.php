<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd(request()->all());
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
        dd(request()->all());
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
        $profile = User::find($id);
        if($request->input('name'))
        {
            $this->validate($request, array(
                'name'=> 'required|max:255',            
                'lastname'=> 'required|max:255',
                'city'=> 'required|max:255',
                'state'=> 'required|max:255',
                'zipcode'=> 'required|max:255',
            ));

            //store in database

            $profile->name = $request->input('name');
            $profile->lastname = $request->input('lastname');
            $profile->city = $request->input('city');
            $profile->state = $request->input('state');
            $profile->zipcode = $request->input('zipcode');
        }
        elseif($request->input('old_password'))
        {
            //dd(request()->all());
            $this->validate($request, array(           
           'old_password' => 'required|string|min:6',
           'new_password' => 'required|string|min:6',
           'password_confirmation' => 'required|string|same:new_password',
        ));

        
            $old_password = $request->old_password;
            $cpassword = $profile->password;
            if (Hash::check($old_password, $cpassword)) {
            //store in database
            $profile->password = Hash::make($request->new_password);
            }
        }
        elseif($request->input('mailing_options'))
        {
            $profile->mailing_options = $request->input('mailing_options');            
        }
        elseif($request->input('class_level'))
        {
            $profile->class_level = $request->input('class_level');
            if($request->input('new_partner_interested'))
                $profile->new_partner_interested = true;
            elseif(!$request->input('new_partner_interested'))
                $profile->new_partner_interested = $request-> false;
        }
        elseif($request->input('play_frequency'))
        {
            $profile->play_frequency = $request->input('play_frequency');
            $profile->skill_level = $request->input('skill_level');
            $profile->master_points = $request->input('master_points');
        }
        else 
        {
           dd(request()->all()); 
        }

        $profile->save();

        //redirect to other page
        return redirect()->route('profile');
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
