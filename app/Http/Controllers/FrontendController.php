<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Review;

class FrontendController extends Controller
{
    public function index()
    {
        $review = Review::where('status', 'Approved')->orderBy('created_at', 'desc')->get();
        return view('home', compact('review'));
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
