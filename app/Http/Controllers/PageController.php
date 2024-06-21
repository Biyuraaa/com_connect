<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoryProject;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function features()
    {
        return view('pages.features');
    }

    public function projects()
    {
        $projects = \App\Models\Project::where('status', 'progress')->get();
        return view('pages.projects.index', compact('projects'));
    }

    public function histories()
    {
        $projects = Auth::user()->projects;

        return view('pages.auth.histories', compact('projects'));
    }

    public function projects_join(Project $project)
    {
        $participants = $project->user_projects;
        $organizer = $project->organizer;
        $category = $project->category;

        return view('pages.projects.join', compact(
            'project',
            'participants',
            'organizer',
            'category'
        ));
    }
}
