@extends('gamintojai.layout')

@section('content')
<div class="card">
    <div class="card-header">gamintojai Page</div>
    <div class="card-body">

        @if($gamintojas)
        <form action="{{ url('gamintojas/' . $gamintojas->id_Gamintojas) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")

            <!-- Display ID gamintojas as editable field -->
            <label for="id_Gamintojas">ID gamintojas</label><br>
            <input type="text" name="id_Gamintojas" value="{{ old('id_Gamintojas', $gamintojas->id_Gamintojas) }}" class="form-control">
            @error('id_Gamintojas')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>

            <label for="gamintojas">gamintojas</label><br>
            <input type="text" name="gamintojas" id="gamintojas" value="{{ old('gamintojas', $gamintojas->gamintojas) }}" class="form-control">
            @error('gamintojas')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <br>
            <div class="row">
            <div class="col-auto">
    <button type="submit" class="btn btn-success">Update gamintojas</button>
</div>

    <div class="col-auto">
        <a class="btn btn-primary" href="{{ route('gamintojas.index') }}">Grįžti į gamintojas</a>
    </div>
</div>

        </form>
        @else
        <p>Error: gamintojas not found</p>
        @endif

    </div>
</div>

@stop
