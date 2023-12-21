@extends('kategorijos.layout')

@section('content')
<div class="card">
    <div class="card-header">Kategorijos Page</div>
    <div class="card-body">

        @if($kategorija)
        <form action="{{ url('kategorija/' . $kategorija->id_Kategorija) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")

            <!-- Display ID Kategorija as editable field -->
            <label for="id_Kategorija">ID Kategorija</label><br>
            <input type="text" name="id_Kategorija" value="{{ old('id_Kategorija', $kategorija->id_Kategorija) }}" class="form-control">
            @error('id_Kategorija')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>

            <label for="pavadinimas">Pavadinimas</label><br>
            <input type="text" name="pavadinimas" id="pavadinimas" value="{{ old('pavadinimas', $kategorija->pavadinimas) }}" class="form-control">
            @error('pavadinimas')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>

            <label for="aprasymas">Aprasymas</label><br>
            <input type="text" name="aprasymas" id="aprasymas" value="{{ old('aprasymas', $kategorija->aprasymas) }}" class="form-control">
            @error('aprasymas')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>

            <label for="fk_Kategorijaid_Kategorija">Select Parent Category</label><br>
            <select name="fk_Kategorijaid_Kategorija" id="fk_Kategorijaid_Kategorija" class="form-control">
                <option value="">None</option>
                @foreach($kategorijosList as $kategorijaOption)
                <option value="{{ $kategorijaOption->id_Kategorija }}" @if(old('fk_Kategorijaid_Kategorija', $kategorija->fk_Kategorijaid_Kategorija) == $kategorijaOption->id_Kategorija) selected @endif>
                    {{ $kategorijaOption->pavadinimas }}
                </option>
                @endforeach
            </select>
            @error('fk_Kategorijaid_Kategorija')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <div class="row">
            <div class="col-auto">
    <button type="submit" class="btn btn-success">Update Category</button>
</div>

    <div class="col-auto">
        <a class="btn btn-primary" href="{{ route('kategorija.index') }}">Grįžti į kategorijas</a>
    </div>
</div>

        </form>
        @else
        <p>Error: Category not found</p>
        @endif

    </div>
</div>

@stop
