@extends('gamintojai.layout')

@section('content')
<div class="card">
    <div class="card-header">Gamintojai Page</div>
    <div class="card-body">

        <form action="{{ url('gamintojas') }}" method="post">
            @csrf
            <!-- Display ID gamintojas as editable field -->
            <div class="mb-3">
                <label for="id_Gamintojas" class="form-label">ID gamintojas</label>
                <input type="text" name="id_Gamintojas" value="{{ old('id_Gamintojas', isset($Gamintojas) ? $Gamintojas->id_Gamintojas : '') }}" class="form-control">
                @error('id_Gamintojas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Gamintojas" class="form-label">Gamintojas</label>
                <input type="text" name="Gamintojas" value="{{ old('Gamintojas') }}" class="form-control">
                @error('Gamintojas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            </div>
            <div class="row">
    <div class="col-auto"> <!-- Use 'col-auto' for automatic width based on content -->
        <button type="submit" class="btn btn-success">Save</button>
    </div>
    <div class="col-auto">
        <a class="btn btn-primary" href="{{ route('gamintojas.index') }}">Grįžti į gamintojas</a>
    </div>
</div>
        </form>
    </div>
</div>
@stop
