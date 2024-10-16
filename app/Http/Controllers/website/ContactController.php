<?php

namespace App\Http\Controllers\website;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Exception;

class ContactController extends Controller
{
    public function contactFormSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'content' => 'required|string|max:2000',
        ]);

        try {
            Message::create([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
                'user_id'=>auth()->user()->id,
            ]);
            session()->flash('success', 'Message saved successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to save message. Please try again later.');
        }

        return redirect()->back();
    }
}
