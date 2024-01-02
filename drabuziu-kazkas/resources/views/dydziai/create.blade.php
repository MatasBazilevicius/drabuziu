@extends('dydziai.layout')

@section('content')
<div class="card">
    <div class="card-header">Dydziai Page</div>
    <div class="card-body">

        <form action="{{ url('dydis') }}" method="post">
            @csrf
            <!-- Display ID gamintojas as editable field -->
            <div class="mb-3">
                <label for="id_Dydis" class="form-label">ID Dydis</label>
                <input type="text" name="id_Dydis" value="{{ old('id_Dydis', isset($Dydis) ? $Dydis->id_Dydis : '') }}" class="form-control">
                @error('id_Dydis')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            </div>
            <div class="row">
    <div class="col-auto"> <!-- Use 'col-auto' for automatic width based on content -->
        <button type="submit" class="btn btn-success">Save</button>
    </div>
    <div class="col-auto">
        <a class="btn btn-primary" href="{{ route('dydis.index') }}">Grįžti į Dydžius</a>
    </div>
</div>
        </form>
    </div>
</div>
@stop
