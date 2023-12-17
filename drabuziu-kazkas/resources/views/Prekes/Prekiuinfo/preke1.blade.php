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
    <!-- Product Card -->
    <div class="col">
        <div class="card h-100">
            <img src="data:image/png;base64,<?php echo base64_encode($row['Nuotrauka']); ?>" class="card-img-top" alt="<?php echo $row['Pavadinimas']; ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['Pavadinimas']; ?></h5>
                <p class="card-text"><?php echo $row['Aprasas']; ?></p>
                <p class="card-text">Price: $<?php echo $row['Kaina']; ?></p>
                <p class="card-text">Quantity: <?php echo $row['Kiekis']; ?></p>
                <p class="card-text">Creation Date: <?php echo $row['Sukurimo_data']; ?></p>
                <p class="card-text">Gender: <?php echo $row['Lytis']; ?></p>
                <!-- Add more details as needed -->
                <a href="{{ route('adddrabuzis.to.cart', $row['id_Drabuzis']) }}" class="btn btn-outline-danger">Pridėti į krepšelį</a>
            </div>
        </div>
    </div>
    <div>
        <a class="btn btn-warning" href="{{ route('prekes') }}">Peržiūrėti visas prekes</a>
    </div>
<?php
} else {
    // Display a message if the product is not found
    echo '<p>No product found with id_Drabuzis=' . $product_id . '.</p>';
}

// Close the prepared statement and the connection
$stmt->close();
$conn->close();
?>
