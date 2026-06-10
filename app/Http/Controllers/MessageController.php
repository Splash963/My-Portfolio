<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin.manage-message', compact('messages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Message::create([
            'user_name' => $validated['name'],
            'email'     => $validated['email'],
            'subject'   => $validated['subject'],
            'message'   => $validated['message'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully!',
        ]);
    }
}
