<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $comments = \App\Models\Comment::where('is_approved', true)->latest()->take(3)->get();
        return view('home', compact('comments'));
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }

    public function projects()
    {
        $projects = \App\Models\Project::latest()->get();
        return view('projects', compact('projects'));
    }

    public function contact()
    {
        return view('contact');
    }
}
