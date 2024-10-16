<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // dd(Auth::user()->role ,Auth::user()->role->name == 'super_admin');
        if (auth()->check() && Auth::user()->role->name == 'super_admin') {
            return $next($request);
        }
        if(auth()->check() && Auth::user()->role->name != 'user'){
            return redirect('admin');
        }
        return redirect('/');
    }
}
