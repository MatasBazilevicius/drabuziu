<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ezlk1owX1BI3cZLl1V/I+CVRZC5zNApLxvwg+Sdmc+fuBE1RyN3TpPPsjIVpE0UH" crossorigin="anonymous">
   
    
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <h2></h2>
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
                    <button class="btn btn-outline-secondary" type="button" onclick="applyDiscount()">Pritaikyti</button>
                </div>
            </div>

            {{-- Order Summary --}}
            <div class="mt-4">
                <h2>Pirkiniai</h2>
                <ul class="list-group">
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <li class="list-group-item py-3">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs">
                                    <img src="data:image/png;base64,{{ base64_encode($details['Nuotrauka']) }}" class="card-img-top"/>
                                    </div>
                                    <div class="col-sm-9">
                                        <h4 class="mb-1">{{ $details['Pavadinimas'] }}</h4>
                                        <p class="mb-1"><strong>Kaina:</strong> ${{ $details['Kaina'] }}</p>
                                        <p class="mb-1"><strong>Kiekis:</strong> {{ $details['Kiekis'] }}</p>
                                        <p><strong>Iš viso:</strong> ${{ $details['Kaina'] * $details['Kiekis'] }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
    <!-- Button for Total Amount -->
                    @php
                    $cartTotal = app('App\Http\Controllers\CartController')->calculateCartTotal();
                @endphp 
                <div class="mt-3">
<!-- Display the total amount with or without discount -->
<div class="mt-3">
    <div id="totalAmount"></div>
    <p><strong>Iš viso:</strong> ${{ $cartTotal }}</p>
</div>

<!-- Payment and Navigation Buttons -->
<div class="d-flex justify-content-between">
    <div class="d-flex justify-content-between">    
        <form action="{{ route('paypal') }}" method="post" class="mr-2" id="paypalForm">
            @csrf 
            <!-- Hidden input field for the amount -->
            <input type="hidden" name="price" id="paypalAmount" value="">
            <button type="button" class="btn btn-success btn-block" onclick="submitPayment()">
                @if(isset($TotalAmount) && $TotalAmount > 0)
                    <script>
                        // Display the updated amount with a note
                        document.getElementById('totalAmount').innerHTML = '<strong>Suma po pritaikytos nuolaidos:</strong> $' + parseFloat("{{ $TotalAmount }}").toFixed(2);
                        // Update the PayPal form's hidden input field with the discounted amount
                        document.getElementById('paypalAmount').value = "{{ $TotalAmount }}";
                    </script>
                @else
                    Apmokėti su Paypal
                    <!-- Update the PayPal form's hidden input field with the original amount -->
                    <script>
                        document.getElementById('totalAmount').innerHTML = '';
                        document.getElementById('paypalAmount').value = "{{ $cartTotal }}";
                    </script>
                @endif
            </button>
        </form>
        <a href="{{ route('krepsys') }}" class="btn btn-success btn-block">Peržiūrėti krepšelį</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>

function applyDiscount() {
    var discountCode = document.getElementById('discount_code').value;

    // Make the AJAX call without using a confirm promise
    $.ajax({
        url: '{{ route('apply.discount') }}',
        method: "POST",
        data: {
            _token: '{{ csrf_token() }}',
            discount_code: discountCode
        },
        success: function (response) {
            // Handle success
            var cartTotal = response.cartTotal;

            // Check if the cartTotal is in cents, and convert it to dollars
            if (cartTotal > 100) {
                cartTotal /= 100; // Convert from cents to dollars
            }

            // Update the totalAmount directly
            document.getElementById('totalAmount').innerHTML = '<strong>Suma po pritaikytos nuolaidos:</strong> $' + cartTotal.toFixed(2);

            // Update the PayPal form's hidden input field with the correct value
            document.getElementById('paypalAmount').value = cartTotal.toFixed(2);

            // Display a success notification
            alert('Nuolaida pritaikyta sėkmingai!');
        },
        error: function (xhr) {
            // Handle error and display a notification
            if (xhr.responseJSON && xhr.responseJSON.error) {
                alert('Error: ' + xhr.responseJSON.error);
            } else {
                alert('Nuolaida nebuvo pritaikyta.');
            }
        }
    });
}

function submitPayment() {
    // Trigger the PayPal form submission
    document.getElementById('paypalForm').submit();
}
</script>
