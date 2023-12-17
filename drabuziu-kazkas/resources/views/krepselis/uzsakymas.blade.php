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
        <p><strong>Iš viso:</strong> ${{ $cartTotal }}</p>
    </div>
    
</div>


            {{-- Payment and Navigation Buttons --}}
            <div class="d-flex justify-content-between">
                <form action="{{ route('paypal')}}" method="post" class="mr-2">
                    @csrf 
                    <button type="submit" class="btn btn-success btn-block">Apmokėti su Paypal</button>
                </form>

                <a href="{{ route('krepsys') }}" class="btn btn-success btn-block">Peržiūrėti krepšelį</a>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
   function applyDiscount() {
    var discountCode = document.getElementById('discount_code').value;

    // Create a promise to handle the confirm dialog
    var confirmPromise = new Promise(function(resolve) {
        if (confirm("Ar tikrai nori pritaikyti nuolaidos kodą?")) {
            resolve(true);
        } else {
            resolve(false);
        }
    });

    // Use the promise to handle the AJAX call
    confirmPromise.then(function(userConfirmed) {
        if (userConfirmed) {
            $.ajax({
                url: '{{ route('apply.discount') }}',
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    discount_code: discountCode
                },
                success: function (response) {
                    // Update the total amount directly
                    var updatedTotal = response.cartTotal;
                    // Display the updated total wherever it needs to be shown
                    console.log('Updated Total:', updatedTotal);
                },
                error: function (error) {
                    console.error('Error applying discount:', error);
                    // Handle error as needed
                }
            });
        }
    });
}
</script>

