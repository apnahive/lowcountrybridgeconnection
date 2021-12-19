<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class SuperAdminLoginController extends Controller
{
    public function __construct()
    {
    	$this->middleware('guest:superadmin');
    }

    public function showLoginForm()
    {
    	return view('auth.superadmin-login');
    }

    public function login(Request $request)
    {
    	//validate the form data
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    		]);
    	//Attept to log the user in
    	if(Auth::guard('superadmin')->attempt(['email'=> $request->email, 'password' => $request->password], $request->remember)){
        return redirect()->intended(route('superadmin'));
        }
    	//if successful, then redirect to dashboard
        return redirect()->back()->with('error','Please check email/password and try again');
        //return redirect()->back()->withInput($request->only('email', 'remember'));
    	//if unsuccessful, then reedirect back to login page
    }
}
