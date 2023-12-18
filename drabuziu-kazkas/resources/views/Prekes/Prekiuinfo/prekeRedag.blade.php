<!-- resources/views/products/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Redaguoti prekės informacija</h1>

    <!-- Edit Product Form -->
    <form method="post" action="{{ route('updateProduct', $row['id_Drabuzis']) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <!-- Product Image -->
                <div class="mb-3">
                    <label for="Nuotrauka" class="form-label">Prekės nuotrauka</label>
                    <input type="file" id="Nuotrauka" name="Nuotrauka" class="form-control">
                    <img src="data:image/png;base64,{{ base64_encode($row['Nuotrauka']) }}" class="img-fluid" alt="{{ $row['Pavadinimas'] }}">
                </div>
            </div>
            <div class="col-md-6">
                <!-- Product Name -->
                <div class="mb-3">
                    <label for="Pavadinimas" class="form-label">Prekės pavadinimas</label>
                    <input type="text" id="Pavadinimas" name="Pavadinimas" class="form-control" value="{{ $row['Pavadinimas'] }}" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="Aprasas" class="form-label">Aprašymas</label>
                    <textarea id="Aprasas" name="Aprasas" class="form-control" required>{{ $row['Aprasas'] }}</textarea>
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label for="Kaina" class="form-label">Kaina</label>
                    <input type="text" id="Kaina" name="Kaina" class="form-control" value="{{ $row['Kaina'] }}" required>
                </div>

                <!-- Add other fields as needed -->

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Atnaujinti prekę</button>
            </div>
        </div>
    </form>

    <!-- Back Button -->
    <div class="container my-3 text-center">
        <a class="btn btn-warning" href="{{ route('prekes') }}">Grįžti į prekių sąrašą</a>
    </div>
</div>
@endsection
