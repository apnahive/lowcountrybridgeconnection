<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class GetflyerController extends Controller
{
    //
    public function __construct()
	{
		//$this->middleware('auth');
		//$this->middleware('auth:teacher'); 
	}
    public function getclass($filename)
	{
		/*$user = Auth::check();
		dd($user);*/
		//$user = Session::get('user');
		//dd($user);
		/*$guard = 'teacher';
		if (Auth::guard($guard)->check()){
            //return redirect()->route('superadmin');
            dd('teacher');
        }
        dd('not found');*/



	    $fullpath="flyer/class/{$filename}";
	    return response()->download(storage_path($fullpath), null, [], null);
	}
	public function getseries($filename)
	{
		/*$user = Auth::check();
		dd($user);*/
		//$user = Session::get('user');
		//dd($user); 
	    $fullpath="flyer/series/{$filename}";
	    return response()->download(storage_path($fullpath), null, [], null);
	}

	public function gettournament($filename)
    {
        /*$user = Auth::check();
        dd($user);*/
        //$user = Session::get('user');
        //dd($user);
        $fullpath="flyer/tournament/{$filename}";
        return response()->download(storage_path($fullpath), null, [], null);
    }
}
