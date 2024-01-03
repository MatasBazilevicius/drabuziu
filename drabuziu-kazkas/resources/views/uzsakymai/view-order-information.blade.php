<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Užsakymo būsena</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #495057;
            text-align: center;
            margin: 20px;
        }

        #order-details {
            max-width: 500px;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #order-status {
            font-size: 1.5em;
            margin-bottom: 20px;
            color: #007bff;
        }

        .welcome-button {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            position: absolute;
            top: 10px;
        }

        #first-welcome {
            left: 10px;
        }

        #second-welcome {
            left: 150px; /* Adjust the left position as needed */
        }
    </style>
</head>
<body>
    <!-- Welcome buttons -->
    <a href="{{ url('/views/welcome') }}" class="welcome-button" id="first-welcome">Grįžti į pagrindinį meniu</a>
    <a href="{{ url('/uzsakymai/sektiuzsakyma') }}" class="welcome-button" id="second-welcome">Sekti kitą užsakymą</a>

    <h1>Užsakymo būsena</h1>

    <div id="order-details">
        <p id="order-status">Busena: {{ $order->busena ?? '' }}</p>
    </div>
</body>
</html>
