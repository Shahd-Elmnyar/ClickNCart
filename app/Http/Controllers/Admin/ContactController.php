<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use App\Http\Controllers\Controller;


class ContactController extends Controller
{
    public function index(){
        $messages = Message::all();
        return view('admin.messages.index', compact('messages'));
    }
}
