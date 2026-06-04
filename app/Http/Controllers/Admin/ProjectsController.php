<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('admin.manage-projects');
    }

    public function view_data()
    {
        $projects = Project::all();
        return response()->json($projects);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/projects'), $imageName);


        $project = Project::create([
            'title' => $validated['title'],
            'image' => $imageName,
            'description' => $validated['description'],
            'project_link' => $request->project_link,
            'github_link' => $request->github_link,
        ]);

        return response()->json([
            'message' => 'Project Added Successfully!',
            'project' => $project
        ]);
    }
}
