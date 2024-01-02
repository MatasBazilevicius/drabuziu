<!-- resources/views/uzsakymai/all-orders.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi įvykdyti užsakymai</title>
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

        #order-container {
            max-width: 600px;
            margin: auto;
        }

        .order-card {
            border: 1px solid #dee2e6;
            margin: 10px;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            cursor: pointer; /* Add cursor pointer to indicate it's clickable */
        }

        h2 {
            color: #007bff;
        }

        /* Style for the modal */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        #welcome-button {
            margin-bottom: 20px;
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Button to go to the welcome page -->
    <button id="welcome-button" onclick="goToWelcomePage()">Grįžti į pagrindinį meniu</button>

    <h1>Visi įvykdyti užsakymai</h1>

    <div id="order-container">
        @foreach ($orders as $order)
            <div class="order-card" onclick="showOrderDetails('{{ $order->id_Uzsakymas }}', '{{ $order->Vardas }} {{ $order->Pavarde }}', '{{ $order->pristatymo_budas }}', '{{ $order->Pristatymo_salis }}', '{{ $order->Gatves_adresas }}, {{ $order->Pasto_kodas }}, {{ $order->Miestas }}, Lietuva')">
                <h2>Užsakymo ID: {{ $order->id_Uzsakymas }}</h2>
                <p>Klientas: {{ $order->Vardas }} {{ $order->Pavarde }}</p>
            </div>
        @endforeach
    </div>

    <!-- The Modal -->
    <div id="orderModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close" onclick="closeOrderDetails()">&times;</span>
            <h2 id="modalOrderID"></h2>
            <p id="modalClientName"></p>
            <p id="modalDeliveryType"></p>
            <p id="modalDeliveryCountry"></p>
            <p id="modalAddress"></p>
        </div>
    </div>

    <!-- Add any additional content or scripts as needed -->

    <script>
        // Function to show order details in the modal
        function showOrderDetails(orderID, clientName, deliveryType, deliveryCountry, address) {
            document.getElementById("modalOrderID").innerText = "Užsakymo ID: " + orderID;
            document.getElementById("modalClientName").innerText = "Klientas: " + clientName;
            document.getElementById("modalDeliveryType").innerText = "Pristatymo būdas: " + deliveryType;
            document.getElementById("modalDeliveryCountry").innerText = "Pristatymo šalis: " + deliveryCountry;
            document.getElementById("modalAddress").innerText = "Pristatymo adresas: " + address;

            // Display the modal
            document.getElementById("orderModal").style.display = "block";
        }

        // Function to close the modal
        function closeOrderDetails() {
            // Hide the modal
            document.getElementById("orderModal").style.display = "none";
        }

        // Function to go to the welcome page
        function goToWelcomePage() {
        window.location.href = '/drabuziu/drabuziu-kazkas/public/views/welcome'; // Directly navigating to /welcome
    }
    </script>
</body>

</html>
