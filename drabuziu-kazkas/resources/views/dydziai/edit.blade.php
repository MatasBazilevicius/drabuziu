@extends('dydziai.layout')

@section('content')
<div class="card">
    <div class="card-header">Dydziai Page</div>
    <div class="card-body">

        @if($dydis)
        <form action="{{ url('dydis/' . $dydis->id_Dydis) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")

            <!-- Display ID gamintojas as editable field -->
            <label for="id_Dydis">ID dydis</label><br>
            <input type="text" name="id_Dydis" value="{{ old('id_Dydis', $dydis->id_Dydis) }}" class="form-control">
            @error('id_Dydis')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>

            <label for="name">name</label><br>
            <input type="text" name="name" id="name" value="{{ old('name', $dydis->name) }}" class="form-control">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <br>
            <div class="row">
            <div class="col-auto">
    <button type="submit" class="btn btn-success">Update dydis</button>
</div>

    <div class="col-auto">
        <a class="btn btn-primary" href="{{ route('dydis.index') }}">Grįžti į dydžius</a>
    </div>
</div>

        </form>
        @else
        <p>Error: gamintojas not found</p>
        @endif

    </div>
</div>

@stop
