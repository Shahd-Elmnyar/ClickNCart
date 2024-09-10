<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ThanksController extends Controller
{
    public function index()
    {
        return view('website.thankyou');
    }
}
