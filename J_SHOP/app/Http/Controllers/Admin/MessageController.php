<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Mail;
use App\Models\ContactMessage;
use App\Mail\ContactMessageReply;

class MessageController extends Controller
{
    public function sendReply(Request $request, $id)
    {
        $request->validate([
            'reply_message' => 'required|string|max:1000',
        ]);

        $message = ContactMessage::findOrFail($id);
        $replyText = $request->input('reply_message');

        Mail::to($message->email)->send(new ContactMessageReply($message, $replyText));

        return back()->with('success', 'Reply email sent to ' . $message->email);
    }
}
