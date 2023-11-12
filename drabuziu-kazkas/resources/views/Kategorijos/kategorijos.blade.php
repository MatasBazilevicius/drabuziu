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
            <h2 class="text-center">Select a Category</h2>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-secondary mx-2" data-bs-toggle="modal" data-bs-target="#allModal">All</button>
                <button type="button" class="btn btn-secondary mx-2" data-bs-toggle="modal" data-bs-target="#menModal">Men</button>
                <button type="button" class="btn btn-secondary mx-2" data-bs-toggle="modal" data-bs-target="#womenModal">Women</button>
                <button type="button" class="btn btn-secondary mx-2" data-bs-toggle="modal" data-bs-target="#kidsModal">Kids</button>
                <button type="button" class="btn btn-secondary mx-2" data-bs-toggle="modal" data-bs-target="#materialModal">Material</button>
                <button type="button" class="btn btn-secondary mx-2" data-bs-toggle="modal" data-bs-target="#sizeModal">Size</button>
                <button type="button" class="btn btn-secondary mx-2" data-bs-toggle="modal" data-bs-target="#brandModal">Brand</button>
                <!-- Add more categories as needed -->
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <div class="container my-3 text-center">
    <h2 style="color: #2ecc71; border-bottom: 2px solid #2ecc71; padding-bottom: 5px;"></h2>
        <a class="btn btn-warning" href="{{ route('prekes') }}">Peržiūrėti prekes</a>
    </div>

    <!-- Modals -->
    <div class="modal fade" id="allModal" tabindex="-1" aria-labelledby="allModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allModalLabel">All Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Content for the All Products modal -->
                    <p>This is the content for the All Products modal.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Add more modals for other categories as needed -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
