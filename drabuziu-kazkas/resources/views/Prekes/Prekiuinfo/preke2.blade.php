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
    <h1 class="text-center mb-4">Product Details</h1>

    <!-- Product Details Section -->
    <div class="row">
        <div class="col-md-6">
            <img src="https://via.placeholder.com/400" class="img-fluid" alt="Product Image">
        </div>
        <div class="col-md-6">
            <h2>Product Name</h2>
            <p>Aprasas</p>
            <p>Price: $19.99</p>
            <p>Available Sizes: S, M, L, XL</p>
            <p>Color: Blue</p>
            <button class="btn btn-primary">Add to Cart</button>
        </div>
    </div>

    <!-- Additional Product Information -->
    <div class="mt-4">
        <h2>Additional Information</h2>
        <ul>
            <li>Material: Cotton</li>
            <li>Brand: Example Brand</li>
            <li>Category: Men's Clothing</li>
        </ul>
    </div>

        <!-- Back Button -->
        <div class="container my-3 text-center">
    <h2 style="color: #2ecc71; border-bottom: 2px solid #2ecc71; padding-bottom: 5px;"></h2>
        <a class="btn btn-warning" href="{{ route('prekes') }}">Gryžti į prekių peržiūrą</a>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
