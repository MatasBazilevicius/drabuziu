<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorija;

class KategorijaController extends Controller
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
    public function createProduct(Request $request)
    {
        // Retrieve form data
        $name = $request->input('Pavadinimas');
        $description = $request->input('Aprasas');
        $manufacturerID = $request->input('fk_Gamintojasid_Gamintojas');

        // Insert data into the database
        $query = "INSERT INTO kategorijos (Pavadinimas, Aprasas, fk_Gamintojasid_Gamintojas) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssdiss", $name, $description, $manufacturerID);
        $stmt->execute();
        $stmt->close();

        return redirect()->route('prekes')->with('success', 'Kategorija created successfully!');
    }

    public function __destruct()
    {
        // Close the database connection when the controller is destroyed
        $this->conn->close();
    }
}
