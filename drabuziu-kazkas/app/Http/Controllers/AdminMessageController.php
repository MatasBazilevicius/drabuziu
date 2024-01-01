<?php
// AdminMessageController.php

use App\Models\UserZ; // Import the UserZ model

class AdminMessageController extends Controller
{

public function showAdminMessages()
{
    // Fetch the list of users from the database or any other source
    $users = UserZ::all(); // Adjust this query based on your needs

    // Pass the users data to the view
    return view('zinutes1', ['users' => $users]);
}


    public function index()
    {
        $users = UserZ::all(); // Fetch all users
        return view('admin_messages', compact('users'));
    }

    public function messages($userId)
    {
        $user = UserZ::find($userId);
        $messages = $user->messages;

        return view('admin_messages', compact('users', 'user', 'messages'));
    }
}
