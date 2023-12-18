<?php

@extends('layouts.app') <!-- Assuming you have a layout file, adjust this based on your actual layout -->

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Product Edit Form -->
<form method="post" action="{{ route('updateProduct', $row['id_Drabuzis']) }}" enctype="multipart/form-data">
    @csrf
    <!-- Include a hidden input field for the product ID -->
    <input type="hidden" name="product_id" value="{{ $row['id_Drabuzis'] }}">
    
    <div class="col">
        <div class="card h-10">
            <img src="data:image/png;base64,{{ base64_encode($row['Nuotrauka']) }}" class="card-img-top" alt="{{ $row['Pavadinimas'] }}" style="width: 300px; height: 200px;">
            <div class="card-body">
                <!-- Product Name -->
                <div class="form-group">
                    <label for="name">Prekės pavadinimas</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $row['Pavadinimas'] }}" required>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Aprašymas</label>
                    <textarea id="description" name="description" class="form-control" required>{{ $row['Aprasas'] }}</textarea>
                </div>

                <!-- Price -->
                <div class="form-group">
                    <label for="price">Kaina</label>
                    <input type="text" id="price" name="price" class="form-control" value="{{ $row['Kaina'] }}" required>
                </div>

                <!-- Add other fields as needed -->

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Atnaujinti prekę</button>
            </div>
        </div>
    </div>
</form>

<!-- Back Button -->
<div>
    <a class="btn btn-warning" href="{{ route('prekes') }}">Peržiūrėti visas prekes</a>
</div>

@endsection
