<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategorijos Kurimas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container my-5">
        <h1 class="text-center mb-4">Kurti naują kategorija</h1>

        <!-- Product Creation Form -->
        <form method="post" action="{{ route('createCategory') }}" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf

            <!-- Error Message -->
            <div id="errorMessage" class="alert alert-danger" style="display: none;">
                Klaida! Patikrinkite įvestus duomenis.
            </div>

            <!-- Product Details Section -->
            <div class="row">
                <!-- Product Name -->
                <div class="mb-3">
                    <label for="pavadinimas" class="form-label">Kategorijos pavadinimas</label>
                    <input type="text" id="pavadinimas" name="pavadinimas" class="form-control" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="aprasymas" class="form-label">Aprašymas</label>
                    <textarea id="aprasymas" name="aprasymas" class="form-control" required></textarea>
                </div>

                <!-- Manufacturer ID -->
                <div class="mb-3">
                    <label for="fk_Kategorijaid_Kategorija" class="form-label">Kategorijos ID</label>
                    <input type="text" id="fk_Kategorijaid_Kategorija" name="fk_Kategorijaid_Kategorija" class="form-control" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Sukurti kategorija</button>
            </div>
        </form>

        <!-- Back Button -->
        <div class="container my-3 text-center">
            <a class="btn btn-warning" href="{{ route('kategorijos') }}">Grįžti į kategoriju sąrašą</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>


    <script>
        function validateEditForm() {
            // Add your validation logic here
            // For example, check if the entered data is valid
            // For demonstration purposes, let's assume the validation fails
            displayErrorMessage();
            return false; // Prevent form submission
        }
        function displayErrorMessage() {
            // Display the error message
            document.getElementById('errorMessage').style.display = 'block';
        }
    </script>
</body>
</html>

<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "parde";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['pavadinimas'];
    $description = $_POST['aprasymas'];
    $manufacturerID = $_POST['fk_Kategorijaid_Kategorija'];

    // SQL query to insert data into the table
    $sql = "INSERT INTO kategorijos (pavadinimas, aprasymas, fk_Kategorijaid_Kategorija)
            VALUES ('$name', '$description',  '$manufacturerID')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
