
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parde";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM zinutes ORDER BY Laikas DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>{$row['Siuntejo_id']}:</strong> {$row['Turinys']}</p>";
    }
} else {
    echo "No messages yet.";
}

$conn->close();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parde";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];

    // You may need to implement user authentication to get the user ID
    $siuntejo_id = 'User1';

    $sql = "INSERT INTO zinutes (Siuntejo_id, Turinys, Laikas) VALUES ('$siuntejo_id', '$message', NOW())";
    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html>
    <head>
        <title></title>
    <head>
    <body>
        <div> class="modal-dialog">
            <div> class="modal-header">
                <h4>Please select account</h4>

            </div>
            <div> class="modal-vody">
                <?php
                 
                ?>
            </div>
        </div>
</body>
</html>