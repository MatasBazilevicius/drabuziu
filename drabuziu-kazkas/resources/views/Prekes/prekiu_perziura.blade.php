<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container my-5">
    <h1 class="text-center mb-4">Clothing Shop</h1>

    <!-- Category Selection -->
    <div class="mb-4">
        <h2>Select a Category</h2>
        <!-- "Kategorijos" Section -->
        <div>
            <h2 style="color: #e74c3c; border-bottom: 2px solid #e74c3c; padding-bottom: 5px;">Kategorijos</h2>
            <a class="btn btn-danger" href="{{ route('kategorijos') }}">Peržiūrėti kategorijas</a>
        </div>
        <!-- Category Buttons -->
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-secondary">All</button>
            <button type="button" class="btn btn-secondary">Men</button>
            <button type="button" class="btn btn-secondary">Women</button>
            <button type="button" class="btn btn-secondary">Kids</button>
        </div>
    </div>

    <!-- Product Display -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Product 1 -->
        <div class="col">
            <a href="{{ route('preke1') }}">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text">Description of Product 1.</p>
                        <p class="card-text">$19.99</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </a>
        </div>

        <!-- Product 2 -->
        <div class="col">
            <a href="{{ route('preke2') }}">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Product 2</h5>
                        <p class="card-text">Description of Product 2.</p>
                        <p class="card-text">$24.99</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </a>
        </div>

        <!-- Add more product cards here -->

        <div>

        </div>

        <div>
            <h2 style="color: #f39c12; border-bottom: 2px solid #f39c12;">Krepšelis</h2>
            <a class="btn btn-success" href="{{ route('krepsys') }}">Peržiūrėti krepšelį</a>
            <h2>Gryžti atgal i meniu</h2>
            <a class="btn btn-primary" href="{{ route('meniu') }}">Meniu</a>
            <a class="btn btn-primary" href="{{ route('prekekurt') }}">Kurti naują prekę</a>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
