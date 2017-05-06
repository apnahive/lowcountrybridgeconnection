<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherLoginController extends Controller
{
     public function __construct()
    {
    	$this->middleware('guest:teacher');
    }

    public function showLoginForm()
    {
    	return view('auth.teacher-login');
    }

    public function login(Request $request)
    {
    	//validate the form data
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    		]);
    	//Attept to log the user in
    	if(Auth::guard('teacher')->attempt(['email'=> $request->email, 'password' => $request->password], $request->remember)){
        return redirect()->intended(route('teacher'));
        }
    	//if successful, then redirect to dashboard
        return redirect()->back()->withInput($request->only('email', 'remember'));
    	//if unsuccessful, then reedirect back to login page
    }
}