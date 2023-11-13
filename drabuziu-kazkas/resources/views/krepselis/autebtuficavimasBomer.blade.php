@extends('layouts.app') {{-- Assuming you have a layout file set up --}}

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Autentifikavimo langas</h2>
            <!-- Add the image below -->
            <img src="https://townsquare.media/site/481/files/2023/01/attachment-RS48021_GettyImages-157030584-scr.jpg?w=1200&h=0&zc=1&s=0&a=t&q=89" alt="Placeholder Image" class="img-fluid mb-3">

            <!-- Add the link to go back to the menu -->
            <a class="btn btn-primary" href="{{ route('meniu') }}">Atgal į meniu</a>
        </div>
    </div>
</div>
@endsection
