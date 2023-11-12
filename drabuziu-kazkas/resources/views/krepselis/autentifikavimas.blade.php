@extends('layouts.app') {{-- Assuming you have a layout file set up --}}

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2> Autentifikavimo langas</h2>
                <a class="btn btn-primary" href="{{ route('meniu') }}">Atgal į meniu</a>
            </form>
        </div>
    </div>
</div>
@endsection
