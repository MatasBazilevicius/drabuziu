<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container my-5">
    <h1 class="text-center mb-4">Produkto informacija</h1>

    <!-- Product Details Section -->
    <div class="row">
        <div class="col-md-6">
            <img src="https://via.placeholder.com/400" class="img-fluid" alt="Product Image">
        </div>
        <div class="col-md-6">
            <h2>Pavadinimas</h2>
            <p>Aprašymas.</p>
            <p>Kaina: $22,22</p>
            <p>Lytis: Vyrams</p>
            <p>Prekė turime nuo: Sausio 1, 2023</p>
            <p>Medžiaga: Vilna</p>
            <p>Galimi dydžiai: XL, L, M, S</p>
            <p>Spalva: Mėlyna</p>
            <p>Gamintojas: Nike</p>
            <button class="btn btn-primary">Pridėti į krepšelį</button>
        </div>
    </div>

    <!-- Additional Product Information -->
    <div class="mt-4">
        <h2>Papildoma informacija</h2>
        <ul>
             <li>Medžiaga: Vilna</li>
            <li>Gamintojas: Nike</li>
        </ul>
    </div>

    <!-- Back Button -->
    <div class="container my-3 text-center">
    <h2 style="color: #2ecc71; border-bottom: 2px solid #2ecc71; padding-bottom: 5px;"></h2>
        <a class="btn btn-warning" href="{{ route('prekeRedag') }}">Redaguoti prekę</a>
        <h2 style="color: #2ecc71; border-bottom: 2px solid #2ecc71; padding-bottom: 5px;"></h2>
        <a class="btn btn-warning" href="{{ route('prekes') }}">Gryžti į prekių peržiūrą</a>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
