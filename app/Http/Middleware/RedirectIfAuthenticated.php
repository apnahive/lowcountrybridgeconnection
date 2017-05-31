<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {

            case 'superadmin':
                if (Auth::guard($guard)->check()){
                    return redirect()->route('superadmin');
                }
                break;

            case 'unitadmin':
                if (Auth::guard($guard)->check()){
                    return redirect()->route('unitadmins.index');
                }
                break;
            
            case 'manager':
                if (Auth::guard($guard)->check()){
                    return redirect()->route('manager.index');
                }
                break;
            
            case 'teacher':
                if (Auth::guard($guard)->check()){
                    return redirect()->route('teacher.index');
                }
                break;
                
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('/home');
                    }
                break;
        }



        //if (Auth::guard($guard)->check()) {
          //  return redirect('/home');
        //}

        return $next($request);
    }
}
