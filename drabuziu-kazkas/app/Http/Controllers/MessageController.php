<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Naudotojai;
use App\Models\Zinutes;

class MessageController extends Controller
{
    private $conn;

    public function __construct()
    {
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = ""; // Replace with your actual database password
        $dbname = "parde"; // Replace with your actual database name

        // Create connection
        $this->conn = new \mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function sendMessage(Request $request)
    {
        $validatedData = $request->validate([
            'Turinys' => 'required|string|max:255',
        ]);

        // Get the current user ID
        $user = auth()->user();
        $naudotojas = Naudotojai::find($user->id);
        $currentUserId = $naudotojas ? $naudotojas->id_Naudotojas : null;

        // Generate a unique ID
        $randomId = random_int(100000, 999999); // Adjust the range as needed

        // Create a new Zinutes instance and set 'id_Zinute' explicitly
        $message = new Zinutes([
            'id_Zinute' => $randomId,
            'Turinys' => $validatedData['Turinys'],
            'fk_Naudotojasid_Naudotojas' => $currentUserId,
            'fk_Naudotojasid_Naudotojas1' => 1802, // Assuming 1802 is a fixed value
            // Add other fields if necessary
        ]);

        $message->save();

        return response()->json(['message' => 'Message sent successfully'], 201);
    }

    public function getMessages()
    {
        try {
            // Get the current user ID
            $user = auth()->user();
            $naudotojas = Naudotojai::find($user->id);
            $currentUserId = $naudotojas ? $naudotojas->id_Naudotojas : null;

            // Fetch messages for the current user with the given conditions
            $messages = Zinutes::where([
                'fk_Naudotojasid_Naudotojas' => $currentUserId,
                'fk_Naudotojasid_Naudotojas1' => 1802,
            ])->get();

            return response()->json(['messages' => $messages]);

        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error fetching messages: ' . $e->getMessage());

            // Return a response indicating an error
            return response()->json(['error' => 'Error fetching messages'], 500);
        }
    }

    public function getUserIds()
    {
        try {
            // Fetch all user IDs using the Naudotojai model
            $userIds = Naudotojai::pluck('id_Naudotojas')->toArray();
    
            return response()->json(['users' => $userIds]);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error fetching user IDs: ' . $e->getMessage());
    
            // Return a response indicating an error
            return response()->json(['error' => 'Error fetching user IDs'], 500);
        }
    }
    

}
