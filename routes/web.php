<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryProjectController;
use App\Http\Controllers\RewardController;
use App\Models\UserProject;

Route::get('/', function () {
    $projects = \App\Models\Project::all();
    return view('welcome', compact('projects'));
});


Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('categories', CategoryProjectController::class);
    Route::resource('rewards', RewardController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/rewards', [PageController::class, 'rewards'])->name('rewards');
    Route::get('/points', [PageController::class, 'points'])->name('points');
    Route::post('/projects', [ProjectController::class, 'join'])->name('projects.join');
});

Route::controller(PageController::class)->group(function () {
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/features', 'features')->name('features');
    Route::get('/projects', 'projects')->name('projects');
    Route::get('/histories', 'histories')->name('histories');
});

require __DIR__ . '/auth.php';
