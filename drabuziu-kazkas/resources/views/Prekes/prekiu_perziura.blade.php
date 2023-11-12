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
            <h2>Grįžti atgal i meniu</h2>
            <a class="btn btn-primary" href="{{ route('meniu') }}">Meniu</a>
            <a class="btn btn-primary" href="{{ route('prekekurt') }}">Kurti naują prekę</a>
        </div>

    </div>
</div>
<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Filter Products</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Price Range -->
                <div class="mb-3">
                    <label for="priceRange" class="form-label">Price Range:</label>
                    <input type="range" class="form-range" id="priceRange" min="0" max="100" step="10">
                </div>

                <!-- Size -->
                <div class="mb-3">
                    <label for="sizeSelect" class="form-label">Size:</label>
                    <select class="form-select" id="sizeSelect">
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                    </select>
                </div>

                <!-- Brand -->
                <div class="mb-3">
                    <label for="brandSelect" class="form-label">Brand:</label>
                    <select class="form-select" id="brandSelect">
                        <option value="brand1">Brand 1</option>
                        <option value="brand2">Brand 2</option>
                        <option value="brand3">Brand 3</option>
                    </select>
                </div>

                <!-- Material -->
                <div class="mb-3">
                    <label for="materialSelect" class="form-label">Material:</label>
                    <select class="form-select" id="materialSelect">
                        <option value="material1">Material 1</option>
                        <option value="material2">Material 2</option>
                        <option value="material3">Material 3</option>
                    </select>
                </div>

                <!-- Message for No Products -->
                <div id="noProductsMessage" class="alert alert-warning" style="display: none;">
                    No products found with selected filters.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="applyFilters()">Apply Filters</button>
            </div>
        </div>
    </div>
</div>

<script>
    function applyFilters() {
        // For demonstration purposes, let's assume no products are found
        displayNoProductsMessage();
    }

    function displayNoProductsMessage() {
        // Display the no products message
        document.getElementById('noProductsMessage').style.display = 'block';
    }
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function applyFilters() {
            // Add your filtering logic here
            // Retrieve selected options from the modal and update the product display accordingly
            // For example, you can use document.getElementById or jQuery to get values from the modal elements

            // For demonstration purposes, let's assume no products are found
            displayNoProductsMessage();
        }

        function displayNoProductsMessage() {
            // Display the no products message
            document.getElementById('noProductsMessage').style.display = 'block';
        }
    </script>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
