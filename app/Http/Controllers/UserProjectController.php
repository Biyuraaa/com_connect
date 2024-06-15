<?php

namespace App\Http\Controllers;

use App\Models\UserProject;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserProjectRequest;
use App\Http\Requests\UpdateUserProjectRequest;

class UserProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserProjectRequest $request)
    {
        $request->validated();
        UserProject::create([
            'user_id' => $request->user_id,
            'project_id' => $request->project_id,
        ]);
        return redirect()->route('projects')->with('success', 'Project joined successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserProject $userProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserProject $userProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserProjectRequest $request, UserProject $userProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserProject $userProject)
    {
        //
    }
}
