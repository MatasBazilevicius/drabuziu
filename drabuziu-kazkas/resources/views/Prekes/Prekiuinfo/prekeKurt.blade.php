<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Create a New Product</h1>

    <!-- Product Creation Form -->
    <form method="post" action="{{ route('meniu') }}">
        @csrf

        <!-- Product Details Section -->
        <div class="row">
            <div class="col-md-6">
                <!-- Product Image -->
                <div class="mb-3">
                    <label for="image" class="form-label">Product Image</label>
                    <input type="text" id="image" name="image" class="form-control" placeholder="Image URL" required>
                </div>
                <img id="previewImage" class="img-fluid" alt="Preview Image" style="max-height: 200px;">
            </div>
            <div class="col-md-6">
                <!-- Product Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control" required></textarea>
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" id="price" name="price" class="form-control" required>
                </div>

                <!-- Gender -->
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select id="gender" name="gender" class="form-control" required>
                        <option value="men">Men</option>
                        <option value="women">Women</option>
                        <!-- Add more options if needed -->
                    </select>
                </div>

                <!-- Date of Creation -->
                <div class="mb-3">
                    <label for="dateOfCreation" class="form-label">Date of Creation</label>
                    <input type="text" id="dateOfCreation" name="dateOfCreation" class="form-control" placeholder="Sausio 1, 2023" required>
                </div>

                <!-- Material -->
                <div class="mb-3">
                    <label for="material" class="form-label">Material</label>
                    <input type="text" id="material" name="material" class="form-control" required>
                </div>

                <!-- Sizes -->
                <div class="mb-3">
                    <label for="sizes" class="form-label">Available Sizes</label>
                    <input type="text" id="sizes" name="sizes" class="form-control" placeholder="XL, L, M, S" required>
                </div>

                <!-- Color -->
                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" id="color" name="color" class="form-control" required>
                </div>

                <!-- Brand -->
                <div class="mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" id="brand" name="brand" class="form-control" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Create Product</button>
            </div>
        </div>
    </form>

    <!-- Back Button -->
    <div class="container my-3 text-center">
        <a class="btn btn-warning" href="{{ route('prekes') }}">Back to Product List</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Preview Image
    document.getElementById('image').addEventListener('input', function () {
        var previewImage = document.getElementById('previewImage');
        previewImage.src = this.value || 'https://via.placeholder.com/400';
    });
</script>
@endsection
