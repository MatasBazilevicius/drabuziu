@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Redaguoti profilį</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')

                            <!-- User Profile Fields -->
                            <div class="form-group">
                                <label for="Slapyvardis">Slapyvardis</label>
                                <input type="text" id="Slapyvardis" name="Slapyvardis" class="form-control" value="{{ old('Slapyvardis', $naudotojai->Slapyvardis) }}">
                            </div>

                            <!-- 'naudotojai' Profile Fields -->
                            <div class="form-group">
                                <label for="Vardas">Vardas</label>
                                <input type="text" id="Vardas" name="Vardas" class="form-control" value="{{ old('Vardas', $naudotojai->Vardas) }}" >
                            </div>

                            <div class="form-group">
                                <label for="Pavarde">Pavardė</label>
                                <input type="text" id="Pavarde" name="Pavarde" class="form-control" value="{{ old('Pavarde', $naudotojai->Pavarde) }}" >
                            </div>

                            <div class="form-group">
                                <label for="El_Pastas">El. pašto adresas</label>
                                <input type="email" id="El_Pastas" name="El_Pastas" class="form-control" value="{{ old('El_Pastas', $naudotojai->El_Pastas) }}" >
                            </div>

                            <div class="form-group">
                                <label for="telefono_numeris">Telefono numeris</label>
                                <input type="text" id="telefono_numeris" name="telefono_numeris" class="form-control" value="{{ old('telefono_numeris', $naudotojai->telefono_numeris) }}" >
                            </div>

                            <div class="form-group">
                                <label for="Adresas">Gyvenamasis adresas</label>
                                <input type="text" id="Adresas" name="Adresas" class="form-control" value="{{ old('Adresas', $naudotojai->Adresas) }}" >
                            </div>

                            <div class="form-group">
                                <label for="Gimimo_data">Gimimo data</label>
                                <input type="date" id="Gimimo_data" name="Gimimo_data" class="form-control" value="{{ old('Gimimo_data', $naudotojai->Gimimo_data) }}" max="{{ now()->format('Y-m-d') }}">
                            </div>

                            <!-- Add other profile fields as needed -->

                            <button type="submit" class="btn btn-primary">Atnaujinti profilį</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
