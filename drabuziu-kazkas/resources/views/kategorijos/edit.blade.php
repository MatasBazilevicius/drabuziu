@extends('kategorijos.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Kategorijos Page</div>
  <div class="card-body">
      
      <form action="{{ url('kategorija/' .$kategorijos->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id_Kategorija" id="id_Kategorija" value="{{$students->id_Kategorija}}" id="id_Kategorija" />
        <label>Name</label></br>
        <input type="text" name="pavadinimas" id="pavadinimas" value="{{$students->pavadinimas}}" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="aprasymas" id="aprasymas" value="{{$students->aprasymas}}" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="fk_Kategorijaid_Kategorija" id="fk_Kategorijaid_Kategorija" value="{{$students->fk_Kategorijaid_Kategorija}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop