<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krepšelis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container my-5">
        <h1 class="text-center mb-4">Krepšelis</h1>

        <div class="row">
            <div class="col-md-8">
                <h2>Cart Items</h2>
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

            <div class="col-md-4">
                <h2>Order Summary</h2>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Subtotal
                        <span class="badge bg-primary rounded-pill">$44.98</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Tax
                        <span class="badge bg-primary rounded-pill">$5.00</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total
                        <span class="badge bg-primary rounded-pill">$49.98</span>
                    </li>
                </ul>

                <a href="{{ route('uzsakymas') }}" class="btn btn-success mt-3">Formuoti užsakymą</a>
                <a class="btn btn-primary" href="{{ route('meniu') }}">Meniu</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
