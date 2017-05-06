<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnitadminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:unitadmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('unitadmin');
    }
}
