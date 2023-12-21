@extends('kategorijos.layout')
@section('content')

<div class="card">
  <div class="card-header">Kategorijos Page</div>
  <div class="card-body">
    <div class="card-body">
      <h5 class="card-title">Pavadinimas: {{ $kategorijos->pavadinimas }}</h5>
      <p class="card-text">Aprasymas: {{ $kategorijos->aprasymas }}</p>
      <p class="card-text">id_Kategorija: {{ $kategorijos->id_Kategorija }}</p>

      @if ($kategorijos->fk_Kategorijaid_Kategorija && $kategorijos->fkKategorija)
        <p class="card-text">Kokiai kategorijai priklauso: {{ $kategorijos->fkKategorija->pavadinimas }}</p>
      @else
        <p class="card-text">Kokiai kategorijai priklauso: None</p>
      @endif
      <div class="col-auto">
        <a class="btn btn-primary" href="{{ route('kategorija.index') }}">Grįžti į kategorijas</a>
    </div>
    </div>
  </div>
</div>
