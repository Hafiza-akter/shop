<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckSuperAdmin
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
        $user = Session::get('user');
        // dd($user->is_super_admin);
        if($user->is_super_admin == 1){
            return $next($request);
        }
        else{
            return redirect()->route('dashboard');
        }
        
    }
}
