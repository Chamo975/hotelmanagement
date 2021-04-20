<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ReceptionistMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->usertype =='receptionist')
        {
            return $next($request);
        }
        else{

            return redirect('/receptionistdashboard')->with('status','You are Not Allowed To Receptionist Dashboard');

        }
    
    }
}
