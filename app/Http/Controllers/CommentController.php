<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        \App\Models\Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'is_approved' => false,
        ]);

        return back()->with('success', 'Your comment has been submitted and is pending approval.');
    }
}
