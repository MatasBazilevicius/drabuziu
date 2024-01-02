@extends('spalvos.layout')

@section('content')
<div class="card">
    <div class="card-header">spalvos Page</div>
    <div class="card-body">

        @if($spalva)
        <form action="{{ url('spalva/' . $spalva->id_Spalva) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")

            <!-- Display ID medziaga as editable field -->
            <label for="id_Spalva">ID Spalva</label><br>
            <input type="text" name="id_Spalva" value="{{ old('id_Spalva', $spalva->id_Spalva) }}" class="form-control">
            @error('id_Spalva')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>

            <label for="Spalva">Spalva</label><br>
            <input type="text" name="Spalva" id="Spalva" value="{{ old('Spalva', $spalva->Spalva) }}" class="form-control">
            @error('Spalva')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <br>
            <div class="row">
            <div class="col-auto">
    <button type="submit" class="btn btn-success">Update Spalva</button>
</div>

    <div class="col-auto">
        <a class="btn btn-primary" href="{{ route('spalva.index') }}">Grįžti į Spalvas</a>
    </div>
</div>

        </form>
        @else
        <p>Error: Spalva not found</p>
        @endif

    </div>
</div>

@stop
