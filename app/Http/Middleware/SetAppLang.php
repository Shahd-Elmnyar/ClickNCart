<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
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

        $request->setLaravelSession(session());

        if (Auth::check()) {
            $userLang = Auth::user()->lang;

            if (in_array($userLang, config('app.available_locales'))) {
                App::setLocale($userLang);
            } else {
                abort(400, 'User language not available');
            }
        } else {
            $userLang = $request->session()->get('locale', config('app.fallback_locale'));
            if (in_array($userLang, config('app.available_locales'))) {
                App::setLocale($userLang);
            } else {
                App::setLocale(config('app.fallback_locale'));
            }
        }
        return $next($request);
    }
}
