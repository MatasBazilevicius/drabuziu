@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    
                </div>
                </div>
                <h2 style="color: #404040; border-bottom: 2px solid #404040; padding-bottom: 5px;"> </h2>
                <a class="btn btn-primary" href="{{ route('meniu') }}">Meniu</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
