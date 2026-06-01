<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pendingCommentsCount = \App\Models\Comment::where('is_approved', false)->count();
        $totalProjectsCount = \App\Models\Project::count();
        $totalCommentsCount = \App\Models\Comment::count();

        $pendingComments = \App\Models\Comment::where('is_approved', false)->latest()->take(5)->get();

        return view('admin.dashboard', compact('pendingCommentsCount', 'totalProjectsCount', 'totalCommentsCount', 'pendingComments'));
    }
}
