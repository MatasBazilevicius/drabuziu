@extends('kategorijos.layout')

@section('content')
<div class="card">
  <div class="card-header">Kategorijos Page</div>
  <div class="card-body">
    <form action="{{ url('kategorija') }}" method="post">
      @csrf
      <label for="pavadinimas">Kategorijos Pavadinimas</label><br>
      <input type="text" name="pavadinimas" id="pavadinimas" class="form-control"><br>

      <label for="aprasymas">Aprasymas</label><br>
      <input type="text" name="aprasymas" id="aprasymas" class="form-control"><br>

      <label for="id_Kategorija">id_Kategorija</label><br>
      <input type="text" name="id_Kategorija" id="id_Kategorija" class="form-control"><br>

      <label for="fk_Kategorijaid_Kategorija">Select Parent Category</label><br>
      <select name="fk_Kategorijaid_Kategorija" id="fk_Kategorijaid_Kategorija" class="form-control">
        <option value="">Select Kategorija</option>
        @foreach($kategorijos as $kategorija)
          <option value="{{ $kategorija->id_Kategorija }}">{{ $kategorija->pavadinimas }}</option>
        @endforeach
      </select><br>

      <input type="submit" value="Save" class="btn btn-success"><br>
    </form>
  </div>
</div>
@stop
