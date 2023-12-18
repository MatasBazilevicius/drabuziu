<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";// Replace with your actual database password
$dbname = "parde"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
     <!-- Sekmes pranesimas -->
@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @yield('content')
    @yield ('scripts')

    <div class="container my-5">
        <h1 class="text-center mb-4">Drabužių parduotuvė AMMA</h1>

        <!-- Category Selection -->
        <div class="mb-4">
            <h2>Pasirinkite kategoriją</h2>
            <!-- "Kategorijos" Section -->
            <div>
                <h2 style="color: #e74c3c; border-bottom: 2px solid #e74c3c; padding-bottom: 5px;">Kategorijos</h2>
                <a class="btn btn-danger" href="{{ route('kategorijos') }}">Peržiūrėti kategorijas</a>
            </div>
            <!-- Category Buttons -->
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-secondary">All</button>
                <button type="button" class="btn btn-secondary">Men</button>
                <button type="button" class="btn btn-secondary">Women</button>
                <button type="button" class="btn btn-secondary">Kids</button>
            </div>
            <button type="button" class="btn btn-primary float-end mt-2 mr-2" data-bs-toggle="modal" data-bs-target="#filterModal">
                Filtrai
            </button>
        </div>

        <!-- Product Display -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            // Query to fetch products from the database
            $sql = "SELECT * FROM drabuziai";
            $result = $conn->query($sql);

            // Check if there are any products
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
            ?>
                    <!-- Product Card -->
                    <div class="col">
                        <a href="{{ route('preke', ['id' => $row['id_Drabuzis']]) }}">
                            <div class="card h-100">
                            <img src="data:image/png;base64,<?php echo base64_encode($row['Nuotrauka']); ?>" class="card-img-top" alt="<?php echo $row['Pavadinimas']; ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['Pavadinimas']; ?></h5>
                                    <p class="card-text"><?php echo $row['Aprasas']; ?></p>
                                    <p class="card-text">$<?php echo $row['Kaina']; ?></p>                                    
                                    <a href="{{route('preke1', ['id' => $row['id_Drabuzis']])}}" class="btn btn-success">Perziureti preke</a>
                                    <a href="{{ route('adddrabuzis.to.cart', $row['id_Drabuzis']) }}" class="btn btn-outline-danger">Pridėti į krepšelį</a>
                                    <p class="btn-holder">
                                    <a href="{{route('prekeRedag', ['id' => $row['id_Drabuzis']])}}" class="btn btn-primary">Redaguoti preke</a>
                                    <p class="btn-holder">
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php
                }
            } else {
                // Display a message if no products are found
                echo '<p>No products found.</p>';
            }
            ?>
        </div>

        <!-- Existing content -->

    </div>

    <!-- Filter Modal -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <!-- Modal content -->

    </div>

    <!-- Bootstrap JS and additional scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function applyFilters() {
            // Add your filtering logic here
            // Retrieve selected options from the modal and update the product display accordingly
            // For example, you can use document.getElementById or jQuery to get values from the modal elements

            // For demonstration purposes, let's assume no products are found
            displayNoProductsMessage();
        }

        function displayNoProductsMessage() {
            // Display the no products message
            document.getElementById('noProductsMessage').style.display = 'block';
        }
    </script>

<div>
            <!--Cia mygtukai sudeti gryzti i meniu -->
            <h2 style="color: #f39c12; border-bottom: 2px solid #f39c12;">Krepšelis</h2>
            <a class="btn btn-success" href="{{ route('krepsys') }}">Peržiūrėti krepšelį</a>
            <h2>Grįžti atgal į meniu</h2>
            <a class="btn btn-primary" href="{{ route('meniu') }}">Meniu</a>
            <a class="btn btn-primary" href="{{ route('prekekurt') }}">Kurti naują prekę</a>
    </div>
</div>
@yield ('scripts')
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
