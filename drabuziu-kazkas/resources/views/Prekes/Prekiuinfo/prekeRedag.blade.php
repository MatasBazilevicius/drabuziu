<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container my-5">
    <h1 class="text-center mb-4">Edit Product</h1>

    <!-- Product Details Section -->
    <div class="row">
        <div class="col-md-6">
            <img src="https://via.placeholder.com/400" class="img-fluid" alt="Product Image">
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name" class="form-control" value="Fake Product Name" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" required>Fake product description goes here.</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price" name="price" class="form-control" value="29.99" required>
            </div>

            <!-- Add other fields as needed -->

            <button type="submit" class="btn btn-primary">Update Product</button>

            <!-- Delete Button with Confirmation -->
            <button type="button" class="btn btn-danger" id="deleteButton">Delete Product</button>

            <!-- Delete Confirmation Modal -->
            <div class="modal" tabindex="-1" role="dialog" id="deleteConfirmationModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this product?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <div class="container my-3 text-center">
        <a class="btn btn-warning" href="{{ route('prekes') }}">Back to Product List</a>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Show delete confirmation modal when delete button is clicked
    document.getElementById('deleteButton').addEventListener('click', function () {
        var modal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
        modal.show();
    });

    // Handle delete confirmation
    document.getElementById('confirmDeleteButton').addEventListener('click', function () {
        // Perform the delete action here
        // For demonstration purposes, you can redirect to a delete route or perform an AJAX delete request
        // Replace the following line with your actual delete logic
        alert('Product deleted!');
        // Close the modal
        var modal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
        modal.hide();
    });
</script>
</body>
</html>
    