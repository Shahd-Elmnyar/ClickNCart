<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
        // Add your admin check logic here
        // if (auth()->check() && auth()->user()->isAdmin()) {
        //     return $next($request);
        // }
        return $next($request);
        // return redirect('/'); // Redirect to home if not admin
    }
}
