<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $users = \App\Models\User::all();
            $projects = \App\Models\Project::all();
            $communities = \App\Models\Community::all();
            $upcomingProjects = \App\Models\Project::where('date', '>', now())->get();
            return view('dashboard.index', compact(
                'users',
                'projects',
                'communities',
                'upcomingProjects'
            ));
        } else {
            $projects = \App\Models\Project::all();
            return view('welcome', compact('projects'));
        }
    }

    public function users()
    {
        $users = \App\Models\User::all();
        return view('dashboard.users.index', compact('users'));
    }
}
