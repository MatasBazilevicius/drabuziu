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

        <!-- Kurti kategoriją Button (Top-Right) -->
        <div class="text-end">
            <a class="btn btn-warning" href="{{ route('kategorijos_k') }}">Kurti kategoriją</a>
        </div>


        <!-- Category Selection and Operations -->
        <div class="mb-4 mt-4">
            <h2 class="text-center" style="color: #2ecc71; border-bottom: 2px solid #2ecc71; padding-bottom: 5px;">Kategorijų langas</h2>
            <div class="d-flex flex-column">
                <!-- Categories (Left) -->


                <div class="mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn-category" data-bs-toggle="modal" data-bs-target="#allModal">Visi</button>
                        <div class="d-flex">
                            <button class="btn btn-warning me-2" onclick="editCategory()">Redaguoti kategoriją</button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Šalinti kategoriją</button>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn-category" data-bs-toggle="modal" data-bs-target="#menModal">Vyrai</button>
                        <div class="d-flex">
                            <button class="btn btn-warning me-2" onclick="editCategory()">Redaguoti kategoriją</button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Šalinti kategoriją</button>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn-category" data-bs-toggle="modal" data-bs-target="#womenModal">Moterys</button>
                        <div class="d-flex">
                            <button class="btn btn-warning me-2" onclick="editCategory()">Redaguoti kategoriją</button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Šalinti kategoriją</button>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn-category" data-bs-toggle="modal" data-bs-target="#kidsModal">Vaikai</button>
                        <div class="d-flex">
                            <button class="btn btn-warning me-2" onclick="editCategory()">Redaguoti kategoriją</button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Šalinti kategoriją</button>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn-category" data-bs-toggle="modal" data-bs-target="#materialModal">Medžiaga</button>
                        <div class="d-flex">
                            <button class="btn btn-warning me-2" onclick="editCategory()">Redaguoti kategoriją</button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Šalinti kategoriją</button>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn-category" data-bs-toggle="modal" data-bs-target="#sizeModal">Dydis</button>
                        <div class="d-flex">
                            <button class="btn btn-warning me-2" onclick="editCategory()">Redaguoti kategoriją</button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Šalinti kategoriją</button>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn-category" data-bs-toggle="modal" data-bs-target="#brandModal">Prekės ženklas</button>
                        <div class="d-flex">
                            <button class="btn btn-warning me-2" onclick="editCategory()">Redaguoti kategoriją</button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Šalinti kategoriją</button>
                        </div>
                    </div>
                </div>
                <!-- Add more categories as needed -->
            </div>
        </div>

       <!-- Modals -->
<div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCategoryModalLabel">Šalinti kategoriją</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ar tikrai norite šalinti šią kategoriją?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Atšaukti</button>
                <button type="button" class="btn btn-danger" onclick="deleteCategory()">Šalinti</button>
            </div>
        </div>
    </div>
</div>

<!-- Success Message -->
<div id="deleteSuccessMessage" class="alert alert-success" style="display: none;">
    Kategorija buvo sėkmingai ištrinta.
</div>

<script>
    function deleteCategory() {
        // Add your logic to delete the category here

        // For demonstration purposes, let's assume the category is successfully deleted
        displayDeleteSuccessMessage();
    }

    function displayDeleteSuccessMessage() {
        // Display the success message
        document.getElementById('deleteSuccessMessage').style.display = 'block';

        // You can also redirect or perform other actions after displaying the message
    }
</script>

        <!-- "Grįžti kategoriją" button to go back to the main category page -->
        <div class="container my-3 text-center">
            <h2 style="color: #2ecc71; border-bottom: 2px solid #2ecc71; padding-bottom: 5px;"></h2>
            <a class="btn btn-warning" href="{{ route('prekes') }}">Grįžti į prekių langą</a>
        </div>

        <!-- Add more modals for other categories as needed -->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
