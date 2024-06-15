<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\User;
use App\Models\UserProject;
use App\Models\CategoryProject;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('dashboard.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organizers = User::all();
        $categories = CategoryProject::all();
        return view('dashboard.projects.create', compact('organizers', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $request->validated();
        $image_name = null;
        if ($request->hasFile('image')) {
            $image_name = $request->name . '_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/images/projects/'), $image_name);
        }
        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'date' => $request->date,
            'location' => $request->location,
            'capacity' => $request->capacity,
            'image' => $image_name,
            'status' => $request->status,
            'organizer_id' => $request->organizer_id,
        ]);
        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $participants = $project->user_projects;
        $organizer = $project->organizer;
        $category = $project->category;

        return view('dashboard.projects.show', compact(
            'project',
            'participants',
            'organizer',
            'category'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $organizers = User::all();
        $categories = CategoryProject::all();
        return view('dashboard.projects.edit', compact('project', 'organizers', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $request->validated();

        $image_name = $project->image;

        if ($request->hasFile('image')) {
            if ($project->image) {
                unlink(public_path('assets/images/projects/' . $project->image));
            }
            $image_name = $request->name . '_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/images/projects/'), $image_name);
        }

        $project->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'date' => $request->date,
            'location' => $request->location,
            'capacity' => $request->capacity,
            'image' => $image_name,
            'status' => $request->status,
            'organizer_id' => $request->organizer_id,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            unlink(public_path('assets/images/projects/' . $project->image));
        }
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }

    public function join(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
        ]);

        UserProject::create([
            'user_id' => $request->user_id,
            'project_id' => $request->project_id,
        ]);

        return redirect()->route('projects')->with('success', 'Project joined successfully');
    }
}
