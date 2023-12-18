@extends('kategorijos.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Kategorijos Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">pavadinimas : {{ $kategorijos->pavadinimas }}</h5>
        <p class="card-text">aprasymas : {{ $kategorijos->aprasymas }}</p>
        <p class="card-text">fk_Kategorijaid_Kategorija : {{ $kategorijos->fk_Kategorijaid_Kategorija }}</p>
  </div>
       
    </hr>
  
  </div>
</div>