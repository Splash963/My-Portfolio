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
            'tools' => $request->tools,
        ]);

        return response()->json([
            'message' => 'Project Added Successfully!',
            'project' => $project
        ]);
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/projects'), $imageName);

            if ($project->image && file_exists(public_path('images/projects/' . $project->image))) {
                unlink(public_path('images/projects/' . $project->image));
            }
            $project->image = $imageName;
        }

        $project->title = $validated['title'];
        $project->description = $validated['description'];
        $project->project_link = $request->project_link;
        $project->github_link = $request->github_link;
        $project->tools = $request->tools;
        $project->save();

        return response()->json([
            'message' => 'Project Updated Successfully!',
            'project' => $project
        ]);
    }

    public function delete($id)
    {
        $project = Project::findOrFail($id);

        if ($project->image && file_exists(public_path('images/projects/' . $project->image))) {
            unlink(public_path('images/projects/' . $project->image));
        }

        $project->delete();

        return response()->json([
            'message' => 'Project Deleted Successfully!'
        ]);
    }
}
