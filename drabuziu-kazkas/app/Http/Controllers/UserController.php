<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = Naudotojai::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update($id)
    {
        $user = Naudotojai::findOrFail($id);

        // Validate and update user data
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:naudotojai,email,' . $id,
            // Add other fields as needed
        ]);

        $user->update($data);

        return redirect()->route('users.edit', $id)->with('success', 'User updated successfully');
    }
}
