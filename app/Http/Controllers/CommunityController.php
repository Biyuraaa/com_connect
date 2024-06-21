<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommunityRequest;
use App\Http\Requests\UpdateCommunityRequest;
use App\Models\CategoryCommunity;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $communities = Community::all();
        return view('dashboard.communities.index', compact('communities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role == 'admin') {
            $users = User::all();
            $categories = CategoryCommunity::all();
            return view('dashboard.communities.create', compact('users', 'categories'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommunityRequest $request)
    {
        Community::create($request->validated());
        return redirect()->route('communities.index')->with('success', 'Community created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Community $community)
    {
        return view('dashboard.communities.show', compact('community'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Community $community)
    {
        if (Auth::user()->role == 'admin') {
            $users = User::all();
            $categories = CategoryCommunity::all();
            return view('dashboard.communities.edit', compact('community', 'users', 'categories'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommunityRequest $request, Community $community)
    {
        $community->update($request->validated());
        return redirect()->route('communities.index')->with('success', 'Community updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Community $community)
    {
        $community->user_communities()->delete();
        $community->delete();

        return redirect()->route('communities.index')->with('success', 'Community deleted successfully');
    }
}
