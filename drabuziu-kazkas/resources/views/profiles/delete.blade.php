<!-- resources/views/profile/delete.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Delete Profile') }}</div>

        <div class="card-body">
            <p>
                {{ __('Please enter your password to confirm the deletion of your profile.') }}
            </p>

            <form method="POST" action="{{ route('profile.delete') }}">
                @csrf

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-danger">
                        {{ __('Delete Profile') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
