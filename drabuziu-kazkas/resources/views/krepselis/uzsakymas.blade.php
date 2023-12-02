@extends('layouts.app') {{-- Assuming you have a layout file set up --}}

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
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
            </form>
        </div>

        <div class="col-md-6">
            {{-- Discount Code Section --}}
            <div class="mt-4">
                <h4>Nuolaidos kodas</h4>
                <div class="input-group mb-3">
                    <input type="text" id="discount_code" name="discount_code" class="form-control" placeholder="Įveskite kodą">
                    <button class="btn btn-outline-secondary" type="button">Pritaikyti</button>
                </div>
            </div>

            {{-- Order Summary --}}
            <div class="mt-4">
                <h2>Order Summary</h2>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Product 1
                        <span class="badge bg-primary rounded-pill">$19.99</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Product 2
                        <span class="badge bg-primary rounded-pill">$24.99</span>
                    </li>
                    <!-- Add more cart items as needed -->
                </ul>
            </div>

            {{-- Payment and Navigation Buttons --}}
            <div class="d-flex justify-content-between">
                <button type ="submit"> Apmokėti su Paypal </button>
                <a href="{{ route('apmokejimas') }}" class="btn btn-success mt-3 btn-block">Apmokėti užsakymą</a>
                <a href="{{ route('krepsys') }}" class="btn btn-succes smt-3 btn-block">Peržiūrėti krepšelį</a>
            </div>
        </div>
    </div>
</div>
@endsection
