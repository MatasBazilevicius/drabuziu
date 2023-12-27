@extends('kategorijos.layout')

@section('content')
<div class="card">
    <div class="card-header">Kategorijos Page</div>
    <div class="card-body">

        <form action="{{ url('kategorija') }}" method="post">
            @csrf
            <!-- Display ID Kategorija as editable field -->
            <div class="mb-3">
                <label for="id_Kategorija" class="form-label">ID Kategorija</label>
                <input type="text" name="id_Kategorija" value="{{ old('id_Kategorija', isset($kategorija) ? $kategorija->id_Kategorija : '') }}" class="form-control">
                @error('id_Kategorija')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pavadinimas" class="form-label">Kategorijos Pavadinimas</label>
                <input type="text" name="pavadinimas" value="{{ old('pavadinimas') }}" class="form-control">
                @error('pavadinimas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="aprasymas" class="form-label">Aprasymas</label>
                <input type="text" name="aprasymas" value="{{ old('aprasymas') }}" class="form-control">
                @error('aprasymas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="fk_Kategorijaid_Kategorija" class="form-label">Select Parent Category</label>
                <select name="fk_Kategorijaid_Kategorija" id="fk_Kategorijaid_Kategorija" class="form-control">
    <option value="">None</option> <!-- Use an empty string for the value -->
    @foreach($kategorijos as $parentKategorija)
        <option value="{{ $parentKategorija->id_Kategorija }}">{{ $parentKategorija->pavadinimas }}</option>
    @endforeach
</select>
@error('fk_Kategorijaid_Kategorija')
    <div class="text-danger">{{ $message }}</div>
@enderror



            </div>

            <div class="row">
    <div class="col-auto"> <!-- Use 'col-auto' for automatic width based on content -->
        <button type="submit" class="btn btn-success">Save</button>
    </div>
    <div class="col-auto">
        <a class="btn btn-primary" href="{{ route('kategorija.index') }}">Grįžti į kategorijas</a>
    </div>
</div>


        </form>
    </div>
</div>
@stop
