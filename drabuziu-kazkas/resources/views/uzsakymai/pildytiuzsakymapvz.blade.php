<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Užsakymo būsena</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Add any additional styles or scripts as needed -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #495057;
            text-align: center;
            margin: 20px;
            position: relative; /* Add relative positioning */
        }

        .order-details {
            max-width: 500px;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .editable-input {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        #welcome-button {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            position: absolute; /* Set absolute positioning */
            top: 10px; /* Adjust top position */
            left: 10px; /* Adjust left position */
        }

        #custom-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-top: 10px; /* Add margin to the top */
        }
    </style>
</head>

<body>
    <h1>Užsakymo būsena</h1>

    <!-- "Welcome Page" button -->
    <a href="{{ url('/views/welcome') }}" id="welcome-button">Grįžti į pagrindinį meniu</a>

    <div class="order-details">
        <!-- Display error messages if there are any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Display order details -->
        <form method="POST" action="{{ route('order.update.status', ['orderId' => $order->id_Uzsakymas]) }}">
            @csrf
            <div class="form-group">
                <label for="editable-input-status">Būsena:</label>
                <input type="text" id="editable-input-status" name="new_status" value="{{ $order->busena }}" class="form-control editable-input">
            </div>

            <button type="submit" class="btn btn-primary">Išsaugoti</button>
        </form>
    </div>

    <!-- "Custom Button" to go to a specific URL -->
    <a href="http://localhost/drabuziu/drabuziu-kazkas/public/uzsakymai/pildytiuzsakyma" id="custom-button">Užsakymo pasirinkimas</a>

    <!-- Add any additional content or scripts as needed -->
</body>

</html>
