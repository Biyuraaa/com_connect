<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryProjectController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\WalletController;

Route::get('/', function () {
    $projects = \App\Models\Project::all();
    return view('welcome', compact('projects'));
});

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::get('projects/{project}/participant/{user}', [ProjectController::class, 'participant'])->name('projects.participant');
    Route::resource('projects', ProjectController::class);
    Route::resource('categories', CategoryProjectController::class);
    Route::get('rewards/buy', [RewardController::class, 'buy'])->name('rewards.buy');
    Route::post('rewards/buy', [RewardController::class, 'buyReward'])->name('rewards.buyReward');
    Route::post('/rewards/give', [RewardController::class, 'give'])->name('rewards.give');
    Route::post('/rewards/redeem-point', [RewardController::class, 'reedemPoint'])->name('rewards.redeem-point');
    Route::patch('rewards/{id}/redeem', [RewardController::class, 'redeemReward'])->name('rewards.redeem');
    Route::resource('rewards', RewardController::class);
    Route::resource('communities', CommunityController::class);
    Route::get('/wallets/deposit', [WalletController::class, 'deposit'])->name('wallets.deposit');
    Route::post('/wallets/deposit', [WalletController::class, 'storeDeposit'])->name('wallets.storeDeposit');
    Route::resource('wallets', WalletController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/{project}/join', [ProjectController::class, 'join'])->name('projects.join');
    Route::post('/projects/{id}/join', [ProjectController::class, 'doJoin'])->name('projects.doJoin');
    //route for remove participants
    Route::delete('/projects/{project}/remove/{user}', [ProjectController::class, 'remove'])->name('projects.remove');
    Route::delete('/projects/{project}/leave', [ProjectController::class, 'leave'])->name('projects.leave');
    Route::get('/communities', [CommunityController::class, 'index'])->name('communities');
});

Route::controller(PageController::class)->group(function () {
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/features', 'features')->name('features');
    Route::get('/projects', 'projects')->name('projects');
    Route::get('/histories', 'histories')->name('histories');
});

require __DIR__ . '/auth.php';
