@extends('medziagos.layout')

@section('content')
<div class="card">
    <div class="card-header">Medziagos Page</div>
    <div class="card-body">

        <form action="{{ url('medziaga') }}" method="post">
            @csrf
            <!-- Display ID Medziaga as editable field -->
            <div class="mb-3">
                <label for="id_Medziaga" class="form-label">ID Medziaga</label>
                <input type="text" name="id_Medziaga" value="{{ old('id_Medziaga', isset($Medziaga) ? $Medziaga->id_Medziaga : '') }}" class="form-control">
                @error('id_Medziaga')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Medziaga" class="form-label">Medziaga</label>
                <input type="text" name="Medziaga" value="{{ old('Medziaga') }}" class="form-control">
                @error('Medziaga')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            </div>
            <div class="row">
    <div class="col-auto"> <!-- Use 'col-auto' for automatic width based on content -->
        <button type="submit" class="btn btn-success">Save</button>
    </div>
    <div class="col-auto">
        <a class="btn btn-primary" href="{{ route('medziaga.index') }}">Grįžti į Medziagas</a>
    </div>
</div>
        </form>
    </div>
</div>
@stop
