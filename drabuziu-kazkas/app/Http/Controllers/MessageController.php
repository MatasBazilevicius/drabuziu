<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function __destruct()
    {
        // Close the database connection when the controller is destroyed
        if ($this->conn) {
            $this->conn->close();
        }
    }

    public function sendMessage(Request $request)
    {
        $validatedData = $request->validate([
            'Turinys' => 'required|string|max:255',
        ]);

        // Create a new Zinutes instance and save it to the database
        $message = new Zinutes([
            'Turinys' => $validatedData['Turinys'],
            // Add other fields if necessary
        ]);

        $message->save();

        return response()->json(['message' => 'Message sent successfully'], 201);
    }

    public function getMessages()
    {
        try {
            // Fetch messages for a specific user (e.g., with fk_Naudotojasid_Naudotojas = 1801)
            $user = User::find(1801);
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
