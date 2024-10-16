<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SetAppLang
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Use authenticated user's locale
            $lang = Auth::user()->locale ?? 'en';
        } else {
            // Use session language or default to 'en'
            $lang = $request->session()->get('lang', 'en');
        }

        App::setLocale($lang);

        return $next($request);
    }
}
