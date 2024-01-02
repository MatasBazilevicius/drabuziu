<!-- Replace your existing index.blade.php content with this code -->
<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your actual database password
$dbname = "parde"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php

$kategorijaSql = "SELECT * FROM kategorijos";
$kategorijaResult = $conn->query($kategorijaSql);

// Check if there are any categories
$kategorijos = [];
if ($kategorijaResult->num_rows > 0) {
    while ($kategorijaRow = $kategorijaResult->fetch_assoc()) {
        $kategorijos[] = $kategorijaRow;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- Bootstrap JS (Popper.js and Bootstrap JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
</script>

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
                <a class="btn btn-danger" href="{{ route('kategorija.index') }}">Peržiūrėti kategorijas</a>
            </div>
        </div>

        <!-- Product Display -->
        <div id="productList" class="row row-cols-1 row-cols-md-3 g-4">
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
                                <img src="data:image/png;base64,{{ base64_encode($row['Nuotrauka']) }}" class="card-img-top" alt="{{ $row['Pavadinimas'] }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $row['Pavadinimas'] }}</h5>
                                    <p class="card-text">{{ $row['Aprasas'] }}</p>
                                    <p class="card-text">${{ $row['Kaina'] }}</p>
                                    <a href="{{ route('preke1', ['id' => $row['id_Drabuzis']]) }}" class="btn btn-success">Perziureti preke</a>
                                    <a href="{{ route('adddrabuzis.to.cart', $row['id_Drabuzis']) }}" class="btn btn-outline-danger">Pridėti į krepšelį</a>
                                    <p class="btn-holder">
                                        <a href="{{ route('prekeRedag', ['id' => $row['id_Drabuzis']]) }}" class="btn btn-primary">Redaguoti preke</a>
                                    <p class="btn-holder">
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

    <!--Cia mygtukai sudeti gryzti i meniu -->
    <h2 style="color: #f39c12; border-bottom: 2px solid #f39c12;">Krepšelis</h2>
    <a class="btn btn-success" href="{{ route('krepsys') }}">Peržiūrėti krepšelį</a>
    <h2>Grįžti atgal į meniu</h2>
    <a class="btn btn-primary" href="{{ route('meniu') }}">Meniu</a>
    <a class="btn btn-primary" href="{{ route('prekekurt') }}">Kurti naują prekę</a>
    </div>
</div>
<!-- Button to trigger the filter modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
    Atidaryti Filtrus
</button>

<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Filtrų parinkimas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your filter form -->
                <form id="filterForm" action="{{ route('products.filter') }}" method="post">
                    @csrf
                    <label for="category">Pasirinkite kategoriją:</label>
                    <select class="form-select" id="category" name="category">
                        <option value="">Visos kategorijos</option>
                        @foreach ($kategorijos as $kategorija)
                            <option value="{{ $kategorija['id_Kategorija'] }}">{{ $kategorija['pavadinimas'] }}</option>
                        @endforeach
                    </select>

                    <label for="priceRange">Pasirinkite kainos intervalą:</label>
                    <input type="range" class="form-range" id="priceRange" name="priceRange" min="0" max="1000">

                    <!-- Other filter options can be added here -->

                    <!-- Apply Filters button -->
                    <button type="submit" class="btn btn-primary">Taikyti filtrus</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Uždaryti</button>
            </div>
        </div>
    </div>
</div>

<!-- Add this script to handle the form submission and update the product listing -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle applyFilters button click
        document.getElementById('applyFilters').addEventListener('click', function () {
            // Get selected category and price range values
            var selectedCategory = document.getElementById('category').value;
            var selectedPriceRange = document.getElementById('priceRange').value;

            // Send AJAX request
            axios.post('/products/filter', {
                category: selectedCategory,
                priceRange: selectedPriceRange
            })
            .then(function (response) {
                // Update the product listing with the filtered results
                document.getElementById('productList').innerHTML = response.data;
                // Close the modal
                $('#filterModal').modal('hide');
            })
            .catch(function (error) {
                console.error('Error:', error);
            });
        });
    });
</script>


@yield ('scripts')
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
