<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategorijos Kurimas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container my-5">
        <h1 class="text-center mb-4">Kategorijos Kurimas</h1>

        <div class="mb-4">
            <h2 class="text-center">Pridėti naują kategoriją</h2>

            <!-- Error Message -->
            <div id="errorMessage" class="alert alert-danger" style="display: none;">
                Klaida! Patikrinkite įvestus duomenis.
            </div>

            <form action="{{ route('kategorijos_k') }}" method="post" onsubmit="return validateForm()">
                @csrf

                <!-- Category Name Input -->
                <div class="mb-3">
                    <label for="newCategoryName" class="form-label">Kategorijos pavadinimas:</label>
                    <input type="text" class="form-control" id="newCategoryName" name="newCategoryName" required>
                </div>

                <div class="mb-3">
                    <label for="parentCategoryName" class="form-label">Kategorijai, kuriai priklausys:</label>
                    <input type="text" class="form-control" id="parentCategoryName" name="parentCategoryName" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Pridėti kategoriją</button>
            </form>
        </div>

        <!-- "Grįžti kategoriją" button to go back to the main category page -->
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