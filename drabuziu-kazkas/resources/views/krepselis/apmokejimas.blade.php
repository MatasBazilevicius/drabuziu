@extends('layouts.app') {{-- Assuming you have a layout file set up --}}

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Apmokėjimas</h2>

            {{-- Payment Authentication Form --}}
            <form method="POST" action="{{ route('autentifikavimas') }}">
                @csrf
                <div class="form-group">
                    <label for="password">Slaptažodis</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <a href="{{ route('autentifikavimas') }}" class="btn btn-success btn-block">Apmokėti</a>
                <a href="{{ route('krepsys') }}" class="btn btn-success btn-block">Peržiūrėti krepšelį</a>
            </form>
        </div>
    </div>
</div>
@endsection

