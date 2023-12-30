<?php

namespace App\Http\Controllers;

use App\Models\Zinutes;
use Illuminate\Http\Request;

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
        // Fetch all messages from the database
        $messages = Zinutes::all();

        return response()->json(['messages' => $messages]);
    }
}
