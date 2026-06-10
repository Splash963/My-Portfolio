<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        $pendingMessages = Message::where('status', 'Pending')->get();
        $repliedMessages = Message::where('status', 'Replied')->get();
        return view('admin.manage-message', compact('messages', 'pendingMessages', 'repliedMessages'));
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

    public function view_all_data($id)
    {
        $message = Message::find($id);
        if (!$message) {
            return response()->json(['success' => false, 'message' => 'Message not found.'], 404);
        }
        return response()->json($message);
    }

    public function reply(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->status = 'Replied';
        $message->save();
        return response()->json([
            'success' => true,
            'message' => 'Message replied successfully!',
        ]);
    }

    public function pending(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->status = 'Pending';
        $message->save();
        return response()->json([
            'success' => true,
            'message' => 'Message pending successfully!',
        ]);
    }
}
