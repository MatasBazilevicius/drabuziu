@extends('layouts.app') {{-- Assuming you have a layout file set up --}}

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Checkout</h2>
            <form method="POST" action="{{ route('meniu') }}">
                @csrf
                {{-- Billing Information --}}
                <div class="form-group">
                    <label for="billing_name">Billing Name</label>
                    <input type="text" id="billing_name" name="billing_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="billing_address">Billing Address</label>
                    <input type="text" id="billing_address" name="billing_address" class="form-control" required>
                </div>
                {{-- Add more billing fields as needed --}}
                
                {{-- Shipping Information (if different) --}}
                <div class="form-group">
                    <label for="shipping_name">Shipping Name</label>
                    <input type="text" id="shipping_name" name="shipping_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for "shipping_address">Shipping Address</label>
                    <input type="text" id="shipping_address" name="shipping_address" class="form-control">
                </div>
                {{-- Add more shipping fields as needed --}}
                
                {{-- Payment Information --}}
                <div class="form-group">
                    <label for="card_number">Card Number</label>
                    <input type="text" id="card_number" name="card_number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="expiration_date">Expiration Date</label>
                    <input type="text" id="expiration_date" name="expiration_date" class="form-control" required>
                </div>
                {{-- Add more payment fields as needed --}}
                
                <button type="submit" class="btn btn-primary">Submit Order</button>
            </form>
        </div>
    </div>
</div>
@endsection
