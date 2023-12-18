<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container my-5">
        <h1 class="text-center mb-4">Drabužių parduotuvė AMMA</h1>

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
                        <div class="text-end">
            <a class="btn btn-warning" href="{{ route('kategorijos_r') }}">Redaguoti kategoriją</a>
        </div>

                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Šalinti kategoriją</button>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn-category" data-bs-toggle="modal" data-bs-target="#menModal">Vyrai</button>
                        <div class="d-flex">
                        <div class="text-end">
            <a class="btn btn-warning" href="{{ route('kategorijos_r') }}">Redaguoti kategoriją</a>
        </div>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Šalinti kategoriją</button>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn-category" data-bs-toggle="modal" data-bs-target="#womenModal">Moterys</button>
                        <div class="d-flex">
                        <div class="text-end">
            <a class="btn btn-warning" href="{{ route('kategorijos_r') }}">Redaguoti kategoriją</a>
        </div>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Šalinti kategoriją</button>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn-category" data-bs-toggle="modal" data-bs-target="#kidsModal">Vaikai</button>
                        <div class="d-flex">
                        <div class="text-end">
            <a class="btn btn-warning" href="{{ route('kategorijos_r') }}">Redaguoti kategoriją</a>
        </div>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Šalinti kategoriją</button>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn-category" data-bs-toggle="modal" data-bs-target="#materialModal">Medžiaga</button>
                        <div class="d-flex">
                        <div class="text-end">
            <a class="btn btn-warning" href="{{ route('kategorijos_r') }}">Redaguoti kategoriją</a>
        </div>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Šalinti kategoriją</button>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn-category" data-bs-toggle="modal" data-bs-target="#sizeModal">Dydis</button>
                        <div class="d-flex">
                        <div class="text-end">
            <a class="btn btn-warning" href="{{ route('kategorijos_r') }}">Redaguoti kategoriją</a>
        </div>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Šalinti kategoriją</button>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn-category" data-bs-toggle="modal" data-bs-target="#brandModal">Prekės ženklas</button>
                        <div class="d-flex">
                        <div class="text-end">
            <a class="btn btn-warning" href="{{ route('kategorijos_r') }}">Redaguoti kategoriją</a>
        </div>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Šalinti kategoriją</button>
                        </div>
                    </div>
                </div>
                <!-- Add more categories as needed -->
            </div>
        </div>
        <div class="text-start mb-3">
        <a class="btn btn-primary" href="{{ route('meniu') }}">Meniu</a>
</div>
