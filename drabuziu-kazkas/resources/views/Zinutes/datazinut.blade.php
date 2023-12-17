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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- Success message -->
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>
        </div>
    <?php endif; ?>

    <?php // The @yield directive is typically used in Blade templates. ?>
    <?php // If you are not using Blade, you might not need this. ?>

    <?php // ... Your content goes here ... ?>

</body>
</html>
