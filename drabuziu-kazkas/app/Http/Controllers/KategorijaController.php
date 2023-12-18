<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Kategorija;
use Illuminate\Support\Facades\Auth;

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

    public function createKategorija(Request $request)
    {
        // Retrieve form data
        $name = $request->input('pavadinimas');
        $description = $request->input('aprasymas');
        $manufacturerID = $request->input('fk_Kategorijaid_Kategorija');

        // Insert data into the database
        $query = "INSERT INTO kategorijos (pavadinimas, aprasymas, fk_Kategorijaid_Kategorija) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bind_param("sss", $name, $description, $manufacturerID);

        // Execute the statement
        $stmt->execute();

        // Close the statement
        $stmt->close();

        // Redirect with success message
        return redirect()->route('kategorija')->with('success', 'Kategorija created successfully!');
    }

    public function __destruct()
    {
        // Close the database connection when the controller is destroyed
        $this->conn->close();
    }
}
