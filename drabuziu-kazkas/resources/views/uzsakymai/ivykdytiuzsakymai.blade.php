<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
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

        #search-input {
            width: 70%;
            padding: 5px;
            margin-bottom: 20px;
        }

        #search-btn {
            width: 28%;
            padding: 6px;
            margin-bottom: 20px;
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

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Įvykdyti užsakymai</h1>

    <!-- Add a search box and a search button -->
    <input type="text" id="search-input" placeholder="Ieškoti pagal užsakymo ID">
    <button id="search-btn" onclick="filterOrders()">Ieškoti</button>

    <div id="order-container">
        <!-- Order 1 -->
        <div class="order-card" data-order-id="001" onclick="showOrderDetails('001', '2023-05-04', 'Į namus', 'Lenkija', 'Vilniaus g. 123, LT-01234, Vilnius, Lietuva')">
            <h2>Užsakymo ID: 001</h2>
            <p>Užsakymo data: 2023-05-04</p>
        </div>

        <!-- Order 2 -->
        <div class="order-card" data-order-id="002" onclick="showOrderDetails('002', '2023-06-02', 'Į paštomatą', 'Vokietija', 'Gedimino pr. 45-7A, LT-01109, Vilnius, Lietuva')">
            <h2>Užsakymo ID: 002</h2>
            <p>Užsakymo data: 2023-06-02</p>
        </div>
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
            document.getElementById("modalClientName").innerText = "Užsakymo data: " + clientName;
            document.getElementById("modalDeliveryType").innerText = "Užsakymo tipas: " + deliveryType;
            document.getElementById("modalDeliveryCountry").innerText = "Užsakymo šalis: " + deliveryCountry;
            document.getElementById("modalAddress").innerText = "Adresas: " + address;

            // Display the modal
            document.getElementById("orderModal").style.display = "block";
        }

        // Function to close the modal
        function closeOrderDetails() {
            // Hide the modal
            document.getElementById("orderModal").style.display = "none";
        }

        // Function to filter orders based on search input
        function filterOrders() {
            var searchValue = document.getElementById('search-input').value.toUpperCase();
            var orderCards = document.getElementsByClassName('order-card');

            for (var i = 0; i < orderCards.length; i++) {
                var orderId = orderCards[i].getAttribute('data-order-id');
                if (orderId.indexOf(searchValue) > -1) {
                    orderCards[i].style.display = '';
                } else {
                    orderCards[i].style.display = 'none';
                }
            }
        }
    </script>
</body>
</html>
