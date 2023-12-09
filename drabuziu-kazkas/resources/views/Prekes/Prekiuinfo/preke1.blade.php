<?php
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM drabuziai WHERE id_Drabuzis = 1"; // Change the condition as needed
$result = $conn->query($sql);

// Check if there is a product with id_Drabuzis=1
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
                <a href="{{ route('preke', ['id' => $row['id_Drabuzis']]) }}" class="btn btn-primary">Pridėti į krepšelį</a>
            </div>
        </div>
    </div>
<?php
} else {
    // Display a message if the product is not found
    echo '<p>No product found with id_Drabuzis=1.</p>';
}
?>
