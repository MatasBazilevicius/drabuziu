<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Užsakymo būsenos pildymas</title>
    <!-- Add any additional styles or scripts as needed -->
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
            position: relative; /* Add relative positioning */
        }

        #search-container {
            max-width: 400px;
            margin: auto;
        }

        #search-box {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        #search-button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
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
    </style>
</head>

<body>
    <h1>Užsakymo būsenos pildymas</h1>

    <div id="search-container">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Button to go to the welcome page -->
        <button id="welcome-button" onclick="goToWelcomePage()">Grįžti į pagrindinį meniu</button>

        <p>Įveskite užsakymo ID</p>
        <input type="text" id="search-box" placeholder="Užsakymo ID">
        <button id="search-button" onclick="performSearch()">Ieškoti</button>
    </div>

    <!-- Add any additional content or scripts as needed -->

    <script>
        function performSearch() {
            var orderId = document.getElementById('search-box').value;

            if (orderId.trim() !== '') {
                window.location.href = '{{ route("order.edit.form", ["orderId" => "__orderId__"]) }}'.replace('__orderId__', orderId);
            } else {
                alert('Įveskite taisyklingą užsakymo numerį.');
            }
        }

        // Function to go to the welcome page
        function goToWelcomePage() {
            window.location.href = '{{ url("/views/welcome") }}'; 
        }
    </script>
</body>

</html>
