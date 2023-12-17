<?php
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your actual database password
$dbname = "parde"; // Replace with your actual database name

// Using the Illuminate\Http\Request instance
use Illuminate\Http\Request;

// Get the product ID from the URL
$product_id = request('id');

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Use prepared statement to prevent SQL injection
$sql = "SELECT * FROM drabuziai WHERE id_Drabuzis = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $product_id);
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if there is a product with the given id_Drabuzis
if ($result->num_rows > 0) {
    // Fetch the data for the specific product
    $row = $result->fetch_assoc();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @yield('content')
    @yield ('scripts')

    <!-- Product Card -->
    <div class="col">
        <div class="card h-10">
        <img src="data:image/png;base64,<?php echo base64_encode($row['Nuotrauka']); ?>" class="card-img-top" alt="<?php echo $row['Pavadinimas']; ?>" style="width: 300px; height: 200px;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['Pavadinimas']; ?></h5>
                <p class="card-text"><?php echo $row['Aprasas']; ?></p>
                <p class="card-text">Price: $<?php echo $row['Kaina']; ?></p>
                <p class="card-text">Quantity: <?php echo $row['Kiekis']; ?></p>
                <p class="card-text">Creation Date: <?php echo $row['Sukurimo_data']; ?></p>
                <p class="card-text">Gender: <?php echo $row['Lytis']; ?></p>
                <!-- Add more details as needed -->
                <a href="{{ route('adddrabuzis.to.cart', $row['id_Drabuzis']) }}" class="btn btn-outline-danger">Pridėti į krepšelį</a>
                <a class="btn btn-warning" href="{{ route('prekes') }}">Peržiūrėti visas prekes</a>
            </div>
        </div>
    </div>
    <div>
<?php
} else {
    // Display a message if the product is not found
    echo '<p>No product found with id_Drabuzis=' . $product_id . '.</p>';
}

// Close the prepared statement and the connection
$stmt->close();
$conn->close();
?>
