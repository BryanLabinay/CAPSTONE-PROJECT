<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    // public function updateProfile($id)
    // {
    //     $profile = User::findOrFail($id);
    //     $user = User::all();
    //     return view('profile.edit', compact('profile', 'user'))->with('updated', 'Profile Picture changed');
    // }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $user->id . '.' . $image->getClientOriginalExtension(); // Added user ID for uniqueness
            $image->move(public_path('images'), $imageName);

            // Only update the image attribute if a new image is uploaded
            $user->image = $imageName;
        }

        // Clear email verification if the email is updated
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Save user record
        $user->save();

        // Flash success message and redirect
        session()->flash('status', 'Profile updated successfully.');
        return redirect()->route('profile.edit')->with('updated', 'Profile Picture Changed');
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
