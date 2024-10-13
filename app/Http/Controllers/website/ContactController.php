<?php

namespace App\Http\Controllers\website;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Exception;
class ContactController extends Controller
{
    public function contactFormSubmit(Request $request)
{
    $validatedData = $request->validate([
        'first_name' => 'required|string|min:3|max:255',
        'Last_name' => 'required|string|min:3|max:255',
        'email' => 'required|email',
        'subject' => 'nullable|string|max:255',
        'c_message' => 'required|string|max:2000',
    ]);
    // Data to pass to the email view
    $emailData = [
        'first_name' => $request->first_name,
        'Last_name' => $request->Last_name,
        'email' => $request->email,
        'subject' => $request->subject,
        'c_message' => $request->c_message,
    ];
    try {
    // Send email using a view for the body
    Mail::send('website.emails.contact', $emailData, function ($message) use ($request) {
        $message->to('shopper@gmail.com')
                ->subject($request->c_subject ?? 'No Subject');
    });
    session()->flash('success', 'Message sent successfully!');
    } catch (Exception $e) {
        session()->flash('error', 'Failed to send message. Please try again later.');
    }    return redirect()->back();
}
}
