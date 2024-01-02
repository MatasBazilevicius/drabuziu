@extends('spalvos.layout')

@section('content')
<div class="card">
    <div class="card-header">Spalvos Page</div>
    <div class="card-body">

        <form action="{{ url('spalva') }}" method="post">
            @csrf
            <!-- Display ID Medziaga as editable field -->
            <div class="mb-3">
                <label for="id_Spalva" class="form-label">ID Spalva</label>
                <input type="text" name="id_Spalva" value="{{ old('id_Spalva', isset($Spalva) ? $Spalva->id_Spalva : '') }}" class="form-control">
                @error('id_Spalva')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Spalva" class="form-label">Spalva</label>
                <input type="text" name="Spalva" value="{{ old('Spalva') }}" class="form-control">
                @error('Spalva')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            </div>
            <div class="row">
    <div class="col-auto"> <!-- Use 'col-auto' for automatic width based on content -->
        <button type="submit" class="btn btn-success">Save</button>
    </div>
    <div class="col-auto">
        <a class="btn btn-primary" href="{{ route('spalva.index') }}">Grįžti į Spalvas</a>
    </div>
</div>
        </form>
    </div>
</div>
@stop
