<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = \App\Models\Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'link' => 'nullable|url',
        ]);

        $project = new \App\Models\Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
            $project->image_path = $imagePath;
        }

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project added successfully.');
    }

    public function edit(\App\Models\Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(\Illuminate\Http\Request $request, \App\Models\Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'link' => 'nullable|url',
        ]);

        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;

        if ($request->hasFile('image')) {
            // Delete old image if needed (skipping for simplicity or can add Storage::disk('public')->delete)
            $imagePath = $request->file('image')->store('projects', 'public');
            $project->image_path = $imagePath;
        }

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(\App\Models\Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
