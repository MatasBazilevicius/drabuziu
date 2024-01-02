@extends('gamintojai.layout')
@section('content')

<div class="card">
  <div class="card-header">gamintojai Page</div>
  <div class="card-body">
    <div class="card-body">
      <h5 class="card-title">Medziaga: {{ $gamintojai->Gamintojas }}</h5>
      <p class="card-text">id_Gamintojas: {{ $gamintojai->id_Gamintojas }}</p>
      <div class="col-auto">
        <a class="btn btn-primary" href="{{ route('gamintojas.index') }}">Grįžti į Gamintojus</a>
    </div>
    </div>
  </div>
</div>
