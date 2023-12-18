<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategorijos Redagavimas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container my-5">
        <h1 class="text-center mb-4">Kategorijos Redagavimas</h1>

        <div class="mb-4">
            <h2 class="text-center">Redaguoti kategoriją</h2>
            <!-- Error Message -->
            <div id="errorMessage" class="alert alert-danger" style="display: none;">
                Klaida! Patikrinkite įvestus duomenis.
            </div>
            <!-- Edit Category Form -->
            <form id="editCategoryForm" onsubmit="return validateEditForm()">
                <div class="form-group mb-3">
                    <label for="editedCategoryName" class="form-label">Redaguotas kategorijos pavadinimas:</label>
                    <input type="text" class="form-control" id="editedCategoryName" name="editedCategoryName" value="Category Name" required>
                </div>
                <button type="submit" class="btn btn-primary">Atnaujinti kategoriją</button>
            </form>
        </div>

        <!-- Back Button -->
        <div class="container my-3 text-center">
            <h2 style="color: #2ecc71; border-bottom: 2px solid #2ecc71; padding-bottom: 5px;"></h2>
            <a class="btn btn-warning" href="{{ route('kategorijos') }}">Grįžti į Kategorijas</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

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
    $name = $_POST['Pavadinimas'];
    $description = $_POST['Aprasas'];
    $price = $_POST['Kaina'];
    $quantity = $_POST['Kiekis'];
    $dateOfCreation = $_POST['Sukurimo_data'];
    $gender = $_POST['Lytis'];
    $manufacturerID = $_POST['fk_Gamintojasid_Gamintojas'];

    // SQL query to insert data into the table
    $sql = "INSERT INTO drabuziai (Pavadinimas, Aprasas, Nuotrauka, Kaina, Kiekis, Sukurimo_data, Lytis, fk_Gamintojasid_Gamintojas)
            VALUES ('$name', '$description', '$imageContent', $price, $quantity, '$dateOfCreation', $gender, $manufacturerID)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
