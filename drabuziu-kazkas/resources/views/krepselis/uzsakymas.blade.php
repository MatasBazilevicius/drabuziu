@extends('layouts.app') {{-- Assuming you have a layout file set up --}}

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Užsakymas</h2>
            <form method="POST" action="{{ route('apmokejimas') }}">
                @csrf
                {{-- Billing Information --}}
                <div class="form-group">
                    <label for="billing_name">Vardas</label>
                    <input type="text" id="billing_name" name="billing_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="billing_address">Adresas</label>
                    <input type="text" id="billing_address" name="billing_address" class="form-control" required>
                </div>
                {{-- Add more billing fields as needed --}}
                
                {{-- Shipping Information (if different) --}}
                <div class="form-group">
                    <label for="shipping_name">Siuntos pavadinimas</label>
                    <input type="text" id="shipping_name" name="shipping_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for "shipping_address">Siuntimo adresas</label>
                    <input type="text" id="shipping_address" name="shipping_address" class="form-control">
                </div>
                {{-- Add more shipping fields as needed --}}
                
                {{-- Payment Information --}}
                <div class="form-group">
                    <label for="card_number">Kortelės numeris</label>
                    <input type="text" id="card_number" name="card_number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="expiration_date">Kortelės galiojimo data</label>
                    <input type="text" id="expiration_date" name="expiration_date" class="form-control" required>
                </div>
                {{-- Add more payment fields as needed --}}
                <div class="d-flex justify-content-between">
                <a href="{{ route('apmokejimas') }}" class="btn btn-success mt-3 btn-block">Apmokėti užsakymą</a>
                <a href="{{ route('krepsys') }}" class="btn btn-success btn-block">Peržiūrėti krepšelį</a>

            </form>
        </div>
    </div>
</div>
@endsection
