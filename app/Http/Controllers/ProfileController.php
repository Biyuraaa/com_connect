<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Project;

class ProfileController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $user_projects = Project::whereHas('user_projects', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();
        $userRewards = $user->user_rewards;
        return view('profile.index', compact(
            'user',
            'user_projects',
            'userRewards'
        ));
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($request->hasFile('image')) {
            // Delete old image if exists
            $oldImage = public_path('assets/images/users/' . $user->image);
            if ($user->image && file_exists($oldImage)) {
                @unlink($oldImage);
            }

            // Store new image
            $image = $request->file('image');
            $imageName = strtolower(str_replace(' ', '_', $user->name)) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/users'), $imageName);

            // Update user's image path in the database
            $user->image = $imageName;
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.index')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
