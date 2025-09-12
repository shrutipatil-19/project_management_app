<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        return view('project_management.pages.project.addProject');
    }
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'desc' => 'required',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
            'timeline' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('projects', 'public');
        }
        $project = Project::create($validated);
        return redirect()->route('listProject')->with('success', 'Project Added Successfully!');
    }
    public function list()
    {
        $projects = Project::get();
        return view('project_management.pages.project.listProject', compact('projects'));
    }
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('project_management.pages.project.editProject', compact('project'));
    }
    // public function update(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string',
    //         'desc' => 'required',
    //         'start_date' => 'required|date',
    //         'end_date'   => 'required|date|after_or_equal:start_date',
    //         'timeline' => 'required|string',
    //         'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    //     ]);
    //     if ($request->hasFile('img')) {
    //         $imagePath = $request->file('img')->store('projects', 'public');
    //     }
    //     $request->update($validated);
    //     return redirect()->route('dashboard')->with('success', 'Project Added Successfully!');
    // }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'desc'       => 'required|string',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
            'timeline'   => 'required|string',
            'img'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $project = Project::findOrFail($id);

        if ($request->hasFile('img')) {
            if ($project->img && Storage::disk('public')->exists($project->img)) {
                Storage::disk('public')->delete($project->img);
            }
            $validated['img'] = $request->file('img')->store('projects', 'public');
        }

        $project->update($validated);

        return redirect()->route('listProject')->with('success', 'Project Updated Successfully!');
    }
    public function delete(Project $project)
    {
        // $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('listProject')->with('success', 'Project Deleted Successfully!');
    }
    // public function destroy(Posts $blog)
    // {
    //     $blog->delete();
    //     return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully!');
    // }
   
}
