<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Import the Request class
use App\Models\UserZ; // Change User to UserZ
use App\Models\Zinutes;
use Illuminate\Support\Str;

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

    // Rest of your code...

    // ...

    public function sendMessage(Request $request)
    {
        $validatedData = $request->validate([
            'Turinys' => 'required|string|max:255',
        ]);

        // Generate a unique ID
        $randomId = random_int(100000, 999999); // Adjust the range as needed

        // Create a new Zinutes instance and set 'id_Zinute' explicitly
        $message = new Zinutes([
            'id_Zinute' => $randomId,
            'Turinys' => $validatedData['Turinys'],
            'fk_Naudotojasid_Naudotojas' => 1801,
            'fk_Naudotojasid_Naudotojas1' => 1802
            // Add other fields if necessary
        ]);

        $message->save();

        return response()->json(['message' => 'Message sent successfully'], 201);
    }

    public function getMessages()
    {
        try {
            // Fetch messages for a specific user (e.g., with fk_Naudotojasid_Naudotojas = 1801)
            $user = UserZ::find(1801); // Change User to UserZ
            $messages = $user->messages;

            return response()->json(['messages' => $messages]);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error fetching messages: ' . $e->getMessage());

            // Return a response indicating an error
            return response()->json(['error' => 'Error fetching messages'], 500);
        }
    }
}
