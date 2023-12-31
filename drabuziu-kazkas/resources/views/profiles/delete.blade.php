<!-- resources/views/profile/delete.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ištrinti profilį') }}</div>

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif

                    <p>
                        {{ __('Įveskite savo prisijungimo slaptažodį, tam kad ištrintumėte savo profilį.') }}
                    </p>

                    <form method="POST" action="{{ route('profile.delete') }}">
                        @csrf

                        <div class="form-group">
                            <label for="password">{{ __('Slaptažodis') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">
                                {{ __('Ištrinti profilį') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
