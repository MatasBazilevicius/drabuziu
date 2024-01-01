<!-- resources/views/view-order-information.blade.php -->

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
    </style>
</head>
<body>
    <h1>Užsakymo būsena</h1>

    <div id="order-details">
    <p id="order-status">Busena: {{ $order->busena ?? '' }}</p>
</div>
        
</body>
</html>
