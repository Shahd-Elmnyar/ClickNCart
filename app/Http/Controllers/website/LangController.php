<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LangController extends Controller
{
    public function set($lang, Request $request)
    {
        if (auth()->check()) {
            auth()->user()->update(['locale' => $lang]);
            return back();
        }
        
        $acceptedLangs = ['en', 'ar'];
        if (!in_array($lang, $acceptedLangs)) {
            $lang = 'en';
        }
        
        $request->session()->put('lang', $lang);
        return back();
    }
}
