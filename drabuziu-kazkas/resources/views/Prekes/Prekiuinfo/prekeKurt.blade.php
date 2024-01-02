<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Kurti naują prekę</h1>

    <!-- Product Creation Form -->
    <form method="post" action="{{ route('createProduct') }}" enctype="multipart/form-data">
        @csrf

        <!-- Product Details Section -->
        <div class="row">
            <div class="col-md-6">
                <!-- Product Image -->
                <div class="mb-3">
                    <label for="Nuotrauka" class="form-label">Prekės nuotrauka</label>
                    <input type="file" id="Nuotrauka" name="Nuotrauka" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Product Name -->
                <div class="mb-3">
                    <label for="Pavadinimas" class="form-label">Prekės pavadinimas</label>
                    <input type="text" id="Pavadinimas" name="Pavadinimas" class="form-control" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="Aprasas" class="form-label">Aprašymas</label>
                    <textarea id="Aprasas" name="Aprasas" class="form-control" required></textarea>
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label for="Kaina" class="form-label">Kaina</label>
                    <input type="text" id="Kaina" name="Kaina" class="form-control" required>
                </div>

                <!-- Gender -->
                <div class="mb-3">
                    <label for="Lytis" class="form-label">Lytis</label>
                    <select id="Lytis" name="Lytis" class="form-control" required>
                        <option value="1">Men</option>
                        <option value="2">Women</option>
                        <!-- Add more options if needed -->
                    </select>
                </div>

                <!-- Date of Creation -->
                <div class="mb-3">
                    <label for="Sukurimo_data" class="form-label">Gavimo data</label>
                    <input type="date" id="Sukurimo_data" name="Sukurimo_data" class="form-control" required>
                </div>

                <!-- Manufacturer ID -->
                <div class="mb-3">
                    <label for="fk_id_Gamintojas_Gamintojai" class="form-label">Gamintojo ID</label>
                    <input type="text" id="fk_id_Gamintojas_Gamintojai" name="fk_id_Gamintojas_Gamintojai" class="form-control" required>
                </div>

                <!-- Color ID -->
                <div class="mb-3">
                    <label for="fk_id_Spalva_spalvos" class="form-label">Spalvos ID</label>
                    <input type="text" id="fk_id_Spalva_spalvos" name="fk_id_Spalva_spalvos" class="form-control" required>
                </div>

                <!-- Size ID -->
                <div class="mb-3">
                    <label for="fk_id_Dydis_dydis" class="form-label">Dydžio ID</label>
                    <input type="text" id="fk_id_Dydis_dydis" name="fk_id_Dydis_dydis" class="form-control" required>
                </div>

                <!-- Material ID -->
                <div class="mb-3">
                    <label for="fk_id_Medziagos_medziagos" class="form-label">Medžiagos ID</label>
                    <input type="text" id="fk_id_Medziagos_medziagos" name="fk_id_Medziagos_medziagos" class="form-control" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Sukurti prekę</button>
            </div>
        </div>
    </form>

    <!-- Back Button -->
    <div class="container my-3 text-center">
        <a class="btn btn-warning" href="{{ route('prekes') }}">Grįžti į prekių sąrašą</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Preview Image
    document.getElementById('Nuotrauka').addEventListener('input', function () {
        var previewImage = document.getElementById('previewImage');
        previewImage.src = this.value || 'https://via.placeholder.com/400';
    });
</script>
@endsection

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
    $image = $_FILES['Nuotrauka']['tmp_name'];
    $imageContent = addslashes(file_get_contents($image));
    $name = $_POST['Pavadinimas'];
    $description = $_POST['Aprasas'];
    $price = $_POST['Kaina'];
    $quantity = $_POST['Kiekis'];
    $dateOfCreation = $_POST['Sukurimo_data'];
    $gender = $_POST['Lytis'];
    $manufacturerID = $_POST['fk_id_Gamintojas_Gamintojai'];
    $colorID = $_POST['fk_id_Spalva_spalvos'];
    $sizeID = $_POST['fk_id_Dydis_dydis'];
    $materialID = $_POST['fk_id_Medziagos_medziagos'];

    // SQL query to insert data into the table
    $sql = "INSERT INTO drabuziai (Pavadinimas, Aprasas, Nuotrauka, Kaina, Kiekis, Sukurimo_data, Lytis, fk_id_Gamintojas_Gamintojai, fk_id_Spalva_spalvos, fk_id_Dydis_dydis, fk_id_Medziagos_medziagos)
            VALUES ('$name', '$description', '$imageContent', $price, $quantity, '$dateOfCreation', $gender, $manufacturerID, $colorID, $sizeID, $materialID)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
