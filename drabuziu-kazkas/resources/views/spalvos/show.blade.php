@extends('spalvos.layout')
@section('content')

<div class="card">
  <div class="card-header">Spalvos Page</div>
  <div class="card-body">
    <div class="card-body">
      <h5 class="card-title">Spalva: {{ $spalvos->Spalva }}</h5>
      <p class="card-text">id_Spalva: {{ $spalvos->id_Spalva }}</p>
      <div class="col-auto">
        <a class="btn btn-primary" href="{{ route('spalva.index') }}">Grįžti į Spalvas</a>
    </div>
    </div>
  </div>
</div>
