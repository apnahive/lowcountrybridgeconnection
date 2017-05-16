<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class ManagerLoginController extends Controller
{
     public function __construct()
    {
    	$this->middleware('guest:manager');
    }

    public function showLoginForm()
    {
    	return view('auth.manager-login');
    }

    public function login(Request $request)
    {
    	//validate the form data
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    		]);
    	//Attept to log the user in
    	if(Auth::guard('manager')->attempt(['email'=> $request->email, 'password' => $request->password], $request->remember)){
        return redirect()->intended(route('manager.index'));
        }
    	//if successful, then redirect to dashboard
        return redirect()->back()->withInput($request->only('email', 'remember'));
    	//if unsuccessful, then reedirect back to login page
    }
}
