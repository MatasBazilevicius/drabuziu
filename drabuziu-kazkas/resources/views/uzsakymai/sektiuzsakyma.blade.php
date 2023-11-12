<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <!-- Add any additional styles or scripts as needed -->
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
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
    </style>
</head>
<body>
    <h1>Užsakymo būsenos sekimas</h1>

    <div id="search-container">
        <p>Įveskite užsakymo ID</p>
        <input type="text" id="search-box" placeholder="Užsakymo ID">
        <button id="search-button" onclick="performSearch()">Ieškoti</button>
    </div>

    <!-- Add any additional content or scripts as needed -->

    <script>
        function performSearch() {
            window.location.href = '{{ route("sektiuzsakymapvz") }}';
        }
    </script>
</body>
</html>
