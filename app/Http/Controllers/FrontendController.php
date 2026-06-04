<?php

namespace App\Http\Controllers;

use App\Models\Project;

class FrontendController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function projects()
    {
        return view('projects', [
            'projects' => Project::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function services()
    {
        return view('services');
    }
}
