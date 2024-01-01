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
    </style>
</head>

<body>
    <h1>Užsakymo būsena</h1>

    <div class="order-details">
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

    <!-- Add any additional content or scripts as needed -->
</body>

</html>
