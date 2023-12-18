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
    <title>Category page</title>
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
        <h1 class="text-center mb-4">Drabužių parduotuvės AMMA kategorijos</h1>
        </div>
        <!-- Category Display -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            // Query to fetch kategorijos from the database
            $sql = "SELECT * FROM kategorijos";
            $result = $conn->query($sql);

            // Check if there are any kategorijos
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
            ?>
                    <!-- Product Card -->
                    <div class="col">
                        <a href="{{ route('kategorija', ['id' => $row['id_Kategorija']]) }}">
                            <div class="card h-100">
                                    <h5 class="card-title"><?php echo $row['pavadinimas']; ?></h5>
                                    <p class="card-text"><?php echo $row['aprasymas']; ?></p>
                                    <a href="{{route('kategorijos_r', ['id' => $row['id_Kategorija']])}}" class="btn btn-primary">Redaguoti kategorija</a>
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
                echo '<p>No categories found.</p>';
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
            document.getElementById('noCategoriesMessage').style.display = 'block';
        }
    </script>

<div>
    <a class="btn btn-primary" href="{{ route('meniu') }}">Meniu</a>
    <a class="btn btn-primary" href="{{ route('kategorijos_k') }}">Kurti naują kategorija</a>
    
</div>

</div>
@yield ('scripts')
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
