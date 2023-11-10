<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        return view('profiles.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            // Add other fields as needed
        ]);

        $user->update([
            'name' => $request->input('name'),
            // Update other fields as needed
        ]);

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }

    public function showDeleteForm()
    {
        return view('profiles.delete');
    }

    public function deleteProfile(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        $user = Auth::user();

        if (Hash::check($request->password, $user->password)) {
            // Delete user and log them out
            $user->delete();
            Auth::logout();

            return redirect('/')->with('success', 'Your profile has been deleted.');
        }

        return redirect()->back()->with('error', 'Incorrect password. Please try again.');
    }
}
