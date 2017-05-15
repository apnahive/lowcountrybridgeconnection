<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    /**
     * Show the application dashboard. 
     *
     * @return \Illuminate\Http\Response
     */   
    public function index()
    {
        $user = Auth::user();
        return view('teacher.index',  ['user' => $user]);
    }
}
