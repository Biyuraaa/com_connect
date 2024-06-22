<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\User;
use App\Models\UserProject;
use App\Models\CategoryProject;
use App\Models\Community;
use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $projects = Project::where('status', 'progress')->get();
            return view('dashboard.projects.index', compact('projects'));
        } else {
            $user = Auth::user();
            $projects = Project::whereHas('user_projects', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->orWhere('organizer_id', $user->id)->get();
            return view('pages.auth.projects.index', compact('projects'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CategoryProject::all();
        if (Auth::user()->role == 'admin') {
            $organizers = User::all();
            return view('dashboard.projects.create', compact('organizers', 'categories'));
        } else {
            return view('pages.auth.projects.create', compact('categories'));
        }
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
        $organizer = $project->organizer;
        $category = $project->category;
        if (Auth::user()->role == 'admin') {
            $participants = $project->user_projects;
            return view('dashboard.projects.show', compact(
                'project',
                'participants',
                'organizer',
                'category'
            ));
        } else {
            //tolong buatkan code untuk menambil reward yang dimiliki user
            $rewards = Reward::whereHas('user_rewards', function ($query) {
                $query->where('user_id', Auth::user()->id)
                    ->where('status', 'pending'); // Menambahkan kondisi status 'pending'
            })->get();
            $participants = $project->user_projects()->with('user')->get();
            return view('pages.auth.projects.show', compact(
                'project',
                'participants',
                'organizer',
                'category',
                'rewards'
            ));
        }
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

    public function join(Project $project)
    {
        $participants = $project->user_projects;
        $organizer = $project->organizer;
        $category = $project->category;

        return view('pages.projects.join', compact('project', 'participants', 'organizer', 'category'));
    }


    public function doJoin(Request $request)
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


    public function participant(Project $project, User $user)
    {
        $projects = Project::whereHas('user_projects', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get(); // Ensure we get a collection

        $communities = Community::whereHas('user_communities', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        return view('pages.auth.projects.participant', compact(
            'user',
            'projects',
            'communities',
            'project'
        ));
    }

    public function remove(Project $project, User $user)
    {
        $user_project = UserProject::where('user_id', $user->id)->where('project_id', $project->id)->first();
        $user_project->delete();
        return redirect()->route('projects.show', $project->id)->with('success', 'Participant removed successfully');
    }
}
