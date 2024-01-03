@extends('layouts.app')

@section('content')

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
?>

<div class="container my-5">
    <h1 class="text-center mb-4">Prekės Informacija</h1>

    <form action="{{ route('updateProduct', $product_id) }}" method="post">
        @csrf
        @method('post')
        <div class="row">
            <div class="col-md-6">
                @if ($row = $result->fetch_assoc())
                    <div class="mb-3">
                        <label>ID:</label>
                        <span>{{ $row['id_Drabuzis'] }}</span>
                    </div>
                    <div class="mb-3">
                        <label>Pavadinimas:</label>
                        <span>{{ $row['Pavadinimas'] }}</span>
                    </div>
                    <div class="mb-3">
                        <label>Aprasas:</label>
                        <span>{{ $row['Aprasas'] }}</span>
                    </div>
                    <div class="mb-3">
                        <label>Kaina:</label>
                        <span>{{ $row['Kaina'] }}</span>
                    </div>
                    <div class="mb-3">
                        <label>Kiekis:</label>
                        <span>{{ $row['Kiekis'] }}</span>
                    </div>
                    <div class="mb-3">
                        <label>Sukurimo data:</label>
                        <span>{{ $row['Sukurimo_data'] }}</span>
                    </div>
                    <div class="mb-3">
                        <label>Lytis:</label>
                        <span>
                            @if ($row['Lytis'] == 1)
                                Men
                            @elseif ($row['Lytis'] == 2)
                                Women
                            @endif
                        </span>
                    </div>
                    <div class="mb-3">
                        <label>Gamintojas ID:</label>
                        <span>{{ $row['fk_id_Gamintojas_Gamintojai'] }}</span>
                    </div>
                    <div class="mb-3">
                        <label>Spalva ID:</label>
                        <span>{{ $row['fk_id_Spalva_spalvos'] }}</span>
                    </div>
                    <div class="mb-3">
                        <label>Dydis ID:</label>
                        <span>{{ $row['fk_id_Dydis_dydis'] }}</span>
                    </div>
                    <div class="mb-3">
                        <label>Medziagos ID:</label>
                        <span>{{ $row['fk_id_Medziagos_medziagos'] }}</span>
                    </div>
                    <a href="{{ route('adddrabuzis.to.cart', $row['id_Drabuzis']) }}" class="btn btn-outline-danger">Pridėti į krepšelį</a>
                @endif
            </div>
            <div class="col-md-6">
                @if ($row = $result->fetch_assoc())
                    <div class="mb-3">
                        <label>Nuotrauka:</label>
                        @if ($row['Nuotrauka'])
                            <img src="data:image/png;base64,{{ base64_encode($row['Nuotrauka']) }}" alt="Product Image" class="img-fluid">
                        @else
                            <p>No image available</p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </form>
</div>

@endsection
