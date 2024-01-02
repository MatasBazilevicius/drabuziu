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
    <h1 class="text-center mb-4">Prekės Redagavimas</h1>

    <form action="{{ route('updateProduct', $product_id) }}" method="post">
        @csrf
        @method('post')
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pavadinimas</th>
                    <th>Aprasas</th>
                    <th>Nuotrauka</th>
                    <th>Kaina</th>
                    <th>Kiekis</th>
                    <th>Sukurimo data</th>
                    <th>Lytis</th>
                    <th>Gamintojas ID</th>
                    <th>Spalva ID</th>
                    <th>Dydis ID</th>
                    <th>Medziagos ID</th>
                </tr>
            </thead>
            <tbody>
                @if ($row = $result->fetch_assoc())
                    <tr>
                        <td>{{ $row['id_Drabuzis'] }}</td>
                        <td><input type="text" name="Pavadinimas" value="{{ $row['Pavadinimas'] }}"></td>
                        <td><input type="text" name="Aprasas" value="{{ $row['Aprasas'] }}"></td>
                        <td><input type="file" name="Nuotrauka"></td>
                        <td><input type="text" name="Kaina" value="{{ $row['Kaina'] }}"></td>
                        <td><input type="text" name="Kiekis" value="{{ $row['Kiekis'] }}"></td>
                        <td><input type="date" name="Sukurimo_data" value="{{ $row['Sukurimo_data'] }}"></td>
                        <td>
                            <select name="Lytis">
                                <option value="1" {{ $row['Lytis'] == 1 ? 'selected' : '' }}>Men</option>
                                <option value="2" {{ $row['Lytis'] == 2 ? 'selected' : '' }}>Women</option>
                            </select>
                        </td>
                        <td><input type="text" name="fk_id_Gamintojas_Gamintojai" value="{{ $row['fk_id_Gamintojas_Gamintojai'] }}"></td>
                        <td><input type="text" name="fk_id_Spalva_spalvos" value="{{ $row['fk_id_Spalva_spalvos'] }}"></td>
                        <td><input type="text" name="fk_id_Dydis_dydis" value="{{ $row['fk_id_Dydis_dydis'] }}"></td>
                        <td><input type="text" name="fk_id_Medziagos_medziagos" value="{{ $row['fk_id_Medziagos_medziagos'] }}"></td>
                    </tr>
                @endif
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Išsaugoti pakeitimus</button>
    </form>
</div>

@endsection
