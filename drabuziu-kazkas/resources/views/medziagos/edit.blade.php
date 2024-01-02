@extends('medziagos.layout')

@section('content')
<div class="card">
    <div class="card-header">medziagos Page</div>
    <div class="card-body">

        @if($medziaga)
        <form action="{{ url('medziaga/' . $medziaga->id_Medziaga) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")

            <!-- Display ID medziaga as editable field -->
            <label for="id_Medziaga">ID medziaga</label><br>
            <input type="text" name="id_Medziaga" value="{{ old('id_Medziaga', $medziaga->id_Medziaga) }}" class="form-control">
            @error('id_Medziaga')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>

            <label for="Medziaga">Medziaga</label><br>
            <input type="text" name="Medziaga" id="Medziaga" value="{{ old('Medziaga', $medziaga->Medziaga) }}" class="form-control">
            @error('Medziaga')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <br>
            <div class="row">
            <div class="col-auto">
    <button type="submit" class="btn btn-success">Update Medziaga</button>
</div>

    <div class="col-auto">
        <a class="btn btn-primary" href="{{ route('medziaga.index') }}">Grįžti į medziagas</a>
    </div>
</div>

        </form>
        @else
        <p>Error: Medziaga not found</p>
        @endif

    </div>
</div>

@stop
