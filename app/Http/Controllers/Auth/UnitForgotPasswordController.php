<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class UnitForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:unitadmin');
    }

    public function showLinkRequestForm() {
        return view('auth.passwords.unitadmin-email');
    }
 
    //defining which password broker to use, in our case its the admins
    protected function broker() {
        return Password::broker('unitadmins');
    }
}
