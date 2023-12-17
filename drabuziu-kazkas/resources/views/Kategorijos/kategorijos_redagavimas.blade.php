<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategorijos Redagavimas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container my-5">
        <h1 class="text-center mb-4">Kategorijos Redagavimas</h1>

        <div class="mb-4">
            <h2 class="text-center">Redaguoti kategoriją</h2>
            <!-- Error Message -->
            <div id="errorMessage" class="alert alert-danger" style="display: none;">
                Klaida! Patikrinkite įvestus duomenis.
            </div>
            <!-- Edit Category Form -->
            <form action="{{ route('kategorijos_r') }}" method="post" onsubmit="return validateForm()">
                @csrf
                <div class="form-group mb-3">
                    <label for="editedCategoryName" class="form-label">Redaguotas kategorijos pavadinimas:</label>
                    <input type="text" class="form-control" id="editedCategoryName" name="editedCategoryName" value="Category Name" required>
                </div>
                <button type="submit" class="btn btn-primary">Atnaujinti kategoriją</button>
            </form>
        </div>

        <!-- Back Button -->
        <div class="container my-3 text-center">
            <h2 style="color: #2ecc71; border-bottom: 2px solid #2ecc71; padding-bottom: 5px;"></h2>
            <a class="btn btn-warning" href="{{ route('kategorijos') }}">Grįžti į Kategorijas</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function validateForm() {
        // Add your validation logic here
        // For example, check if the entered data is valid

        // For demonstration purposes, let's assume the validation fails
        displayErrorMessage();
        return false; // Prevent form submission
    }

    function displayErrorMessage() {
        // Display the error message
        document.getElementById('errorMessage').style.display = 'block';
    }
</script>
</body>
</html>