<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Drabuziai;
use Illuminate\Support\Facades\Auth;

class ProductController1 extends Controller
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
        $image = $request->file('Nuotrauka');
        $imageContent = addslashes(file_get_contents($image->getRealPath()));
        $name = $request->input('Pavadinimas');
        $description = $request->input('Aprasas');
        $price = $request->input('Kaina');
        $gender = $request->input('Lytis');
        $dateOfCreation = $request->input('Sukurimo_data');
        $manufacturerID = $request->input('fk_Gamintojasid_Gamintojas');

        // Insert data into the database
        $query = "INSERT INTO drabuziai (Pavadinimas, Aprasas, Nuotrauka, Kaina, Lytis, Sukurimo_data, fk_Gamintojasid_Gamintojas) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssdiss", $name, $description, $imageContent, $price, $gender, $dateOfCreation, $manufacturerID);
        $stmt->execute();
        $stmt->close();

        return redirect()->route('prekes')->with('success', 'Product created successfully!');
    }

    public function __destruct()
    {
        // Close the database connection when the controller is destroyed
        $this->conn->close();
    }
}
