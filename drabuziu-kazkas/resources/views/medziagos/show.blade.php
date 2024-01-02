@extends('medziagos.layout')
@section('content')

<div class="card">
  <div class="card-header">medziagos Page</div>
  <div class="card-body">
    <div class="card-body">
      <h5 class="card-title">Medziaga: {{ $medziagos->pavadinimas }}</h5>
      <p class="card-text">id_Medziaga: {{ $medziagos->id_Medziaga }}</p>
      <div class="col-auto">
        <a class="btn btn-primary" href="{{ route('medziaga.index') }}">Grįžti į Medziagas</a>
    </div>
    </div>
  </div>
</div>
