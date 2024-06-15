<?php

namespace App\Http\Controllers;

use App\Models\CategoryProject;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryProjectRequest;
use App\Http\Requests\UpdateCategoryProjectRequest;

class CategoryProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CategoryProject::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryProjectRequest $request)
    {
        $request->validated();

        CategoryProject::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryProject $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryProject $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryProjectRequest $request, CategoryProject $category)
    {
        $request->validated();

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryProject $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
