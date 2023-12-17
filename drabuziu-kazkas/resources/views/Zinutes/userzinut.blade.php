$sql = "SELECT id_Naudotojas, Vardas FROM naudotojai";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id_Naudotojas"]. " - Name: " . $row["Vardas"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();