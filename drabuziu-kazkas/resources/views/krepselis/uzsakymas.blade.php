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
                <!-- Display validation errors if any -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @php
    $cartTotal = app('App\Http\Controllers\CartController')->calculateCartTotal();
  @endphp 
  
</script>
    <!-- Order Information Form -->
    <form id="orderForm" method="POST" action="{{ route('check.order.information') }}">
        @csrf <!-- Add CSRF token for security -->

        <!-- Add order information fields based on the OrderController's validation rules -->

        <div class="form-group">
            <label for="Uzsakymo_num">Užsakymo numeris</label>
            <input type="text" id="Uzsakymo_num" name="Uzsakymo_num" class="form-control" value="{{ old('Uzsakymo_num') }}" required>
        </div>

        <input type="hidden" name="suma" id="anotherInput" value="anotherInput">


        <div class="form-group">
            <label for="Vardas">Vardas</label>
            <input type="text" id="Vardas" name="Vardas" class="form-control" value="{{ old('Vardas') }}" required>
        </div>

        <div class="form-group">
            <label for="Pavarde">Pavardė</label>
            <input type="text" id="Pavarde" name="Pavarde" class="form-control" value="{{ old('Pavarde') }}" required>
        </div>

        <div class="form-group">
            <label for="Gatves_adresas">Gatvės adresas</label>
            <input type="text" id="Gatves_adresas" name="Gatves_adresas" class="form-control" value="{{ old('Gatves_adresas') }}" required>
        </div>

        <div class="form-group">
            <label for="Miestas">Miestas</label>
            <input type="text" id="Miestas" name="Miestas" class="form-control" value="{{ old('Miestas') }}" required>
        </div>

        <div class="form-group">
            <label for="Pasto_kodas">Pašto kodas</label>
            <input type="text" id="Pasto_kodas" name="Pasto_kodas" class="form-control" value="{{ old('Pasto_kodas') }}" required>
        </div>

        <div class="form-group">
            <label for="Pristatymo_salis">Pristatymo šalis</label>
            <input type="text" id="Pristatymo_salis" name="Pristatymo_salis" class="form-control" value="{{ old('Pristatymo_salis') }}" required>
        </div>

        <div class="form-group">
            <label for="pristatymo_budas">Pristatymo budas</label>
            <input type="text" id="pristatymo_budas" name="pristatymo_budas" class="form-control" value="{{ old('pristatymo_budas') }}" required>
        </div>

        <div class="form-group">
            <label for="busena">Statusas</label>
            <input type="text" id="busena" name="busena" class="form-control" value="{{ old('busena') }}" required>
        </div>
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
                    <!-- Another hidden input field for the original amount (if needed) -->
                    <input type="hidden" name="originalPrice" id="anotherInput" value="">
                    <button type="button" class="btn btn-success btn-block" onclick="checkOrderInformation()">
                        @if(isset($TotalAmount) && $TotalAmount > 0)
                            <script>
                                // Display the updated amount with a note
                                var displayedAmount = cartTotal / 100;
                                    document.getElementById('totalAmount').innerHTML = '<strong>Suma po pritaikytos nuolaidos:</strong> $' + displayedAmount.toFixed(2);


                                // Update the PayPal form's hidden input field with the discounted amount in cents
                                document.getElementById('paypalAmount').value = "{{ $TotalAmount }}";
                                // Update anotherInput with the original amount in cents (if needed)
                                document.getElementById('anotherInput').value = "{{ $TotalAmount }}";
                            </script>
                        @else
                            Apmokėti su Paypal
                            <!-- Update the PayPal form's hidden input field with the original amount -->
                            <script>
                                document.getElementById('totalAmount').innerHTML = '';
                                var originalAmount = parseFloat("{{ $cartTotal }}") / 100; // Convert to dollars for display
                                document.getElementById('paypalAmount').value = "{{ $cartTotal }}";
                                // Update anotherInput with the original amount in cents (if needed)
                                document.getElementById('anotherInput').value = "{{ $cartTotal }}";
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

            // Convert the cartTotal to dollars for display purposes

            // Update the totalAmount directly
           
            var displayedAmount = cartTotal; // Assuming cartTotal is in dollars
                document.getElementById('totalAmount').innerHTML = '<strong>Suma po pritaikytos nuolaidos:</strong> $' + displayedAmount.toFixed(2);

                document.getElementById('paypalAmount').value = cartTotal.toFixed(2); // Assuming cartTotal is in dollars
                document.getElementById('anotherInput').value = cartTotal.toFixed(2);

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


function checkOrderInformation() {
    var formData = new FormData(document.getElementById('orderForm'));

    $.ajax({
        url: '{{ route('check.order.information') }}',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            
            submitPayment()
        },
        error: function(xhr) {
            // Handle errors, e.g., show an error message
            alert('Prisijungimo duomenys neteisingi. Pabandyk dar kartą');
        }
    });
}

function submitPayment() {
    // Trigger the PayPal form submission
    document.getElementById('paypalForm').submit();
}

</script>
