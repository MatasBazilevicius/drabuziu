<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserZ;
use App\Models\Zinutes;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index'); // Assuming you have an admin index view
    }
    public function getUserIds()
{
    try {
        // Fetch all user IDs
        $userIds = Naudotojai::pluck('id_Naudotojas')->toArray();

        return response()->json(['users' => $userIds]);
    } catch (\Exception $e) {
        // Log the error for debugging
        \Log::error('Error fetching user IDs: ' . $e->getMessage());

        // Return a response indicating an error
        return response()->json(['error' => 'Error fetching user IDs'], 500);
    }
}


    public function getMessages()
    {
        try {
            // Fetch all messages
            $messages = Zinutes::all();

            return response()->json(['messages' => $messages]);
        } catch (\Exception $e) {
            \Log::error('Error fetching messages: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching messages'], 500);
        }
    }

    public function sendMessage(Request $request)
    {
        $validatedData = $request->validate([
            'Turinys' => 'required|string|max:255',
            'fk_Naudotojasid_Naudotojas' => 'required|exists:users,id', // Adjust the validation based on your user model
        ]);

        try {
            // Create a new message
            $message = new Zinutes([
                'Turinys' => $validatedData['Turinys'],
                'fk_Naudotojasid_Naudotojas' => $validatedData['fk_Naudotojasid_Naudotojas'],
            ]);

            $message->save();

            return response()->json(['message' => 'Message sent successfully'], 201);
        } catch (\Exception $e) {
            \Log::error('Error sending message: ' . $e->getMessage());
            return response()->json(['error' => 'Error sending message'], 500);
        }
    }

    public function getUsers()
    {
        try {
            // Fetch all users
            $users = UserZ::all();

            return response()->json(['users' => $users]);
        } catch (\Exception $e) {
            \Log::error('Error fetching users: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching users'], 500);
        }
    }

    public function getMessagesByUser(Request $request)
    {
        try {
            $userId = $request->input('userId');
            $user = UserZ::find($userId);

            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }

            $messages = $user->messages;

            return response()->json(['messages' => $messages]);
        } catch (\Exception $e) {
            \Log::error('Error fetching messages: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching messages for the selected user'], 500);
        }
    }
}
