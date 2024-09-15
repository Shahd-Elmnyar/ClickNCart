<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
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
        $lang = $request->session()->get('lang', 'en');
        App::setLocale($lang);

        $response = $next($request);

        // Log the response for debugging
        Log::debug('Response in SetAppLang middleware', ['response' => $response]);

        return $response;
    }
}
