@extends('kategorijos.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Kategorijos Page</div>
  <div class="card-body">
      
      <form action="{{ url('kategorija') }}" method="post">
        {!! csrf_field() !!}
        <label>Kategorijos Pavadinimas</label></br>
        <input type="text" name="pavadinimas" id="pavadinimas" class="form-control"></br>
        <label>Aprasymas</label></br>
        <input type="text" name="aprasymas" id="aprasymas" class="form-control"></br>
        <label>fk_Kategorijaid_Kategorija</label></br>
        <input type="text" name="fk_Kategorijaid_Kategorija" id="fk_Kategorijaid_Kategorija" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop