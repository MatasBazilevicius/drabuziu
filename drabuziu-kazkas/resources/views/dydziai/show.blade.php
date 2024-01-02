@extends('dydziai.layout')
@section('content')

<div class="card">
  <div class="card-header">dydziai Page</div>
  <div class="card-body">
    <div class="card-body">
      <h5 class="card-title">Name: {{ $dydziai->Name }}</h5>
      <p class="card-text">id_Dydis: {{ $dydziai->id_Dydis }}</p>
      <div class="col-auto">
        <a class="btn btn-primary" href="{{ route('dydis.index') }}">Grįžti į Dydžius</a>
    </div>
    </div>
  </div>
</div>
