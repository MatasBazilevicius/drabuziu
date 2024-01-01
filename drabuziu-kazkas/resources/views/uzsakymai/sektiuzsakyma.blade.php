<!-- resources/views/sektiuzsakyma.blade.php -->

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
    <h1>Užsakymo būsena</h1>

    <div id="search-container">
        <p>Įveskite užsakymo ID</p>
        <input type="text" id="search-box" placeholder="Užsakymo ID">
        <button id="search-button" onclick="performSearch()">Ieškoti</button>
    </div>

    <script>
        function performSearch() {
            var orderId = document.getElementById('search-box').value;
            window.location.href = '{{ route("sektiuzsakymapvz", ["orderId" => "__orderId__"]) }}'.replace('__orderId__', orderId);
        }
    </script>
</body>
</html>
