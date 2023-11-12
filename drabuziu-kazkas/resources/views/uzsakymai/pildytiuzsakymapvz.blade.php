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

        <!-- Separate input fields for location and estimated arrival -->
        <div>
            <label for="editable-input-location">Vieta:</label>
            <input type="text" id="editable-input-location" value="Vilniaus gatvė 20, 03-332, Varšuva, Lenkija" class="form-control editable-input" readonly>
            <button onclick="enableEdit('editable-input-location', 'edit-btn-location', 'save-btn-location')">Redaguoti</button>
            <button onclick="saveChanges('editable-input-location', 'edit-btn-location', 'save-btn-location')">Išsaugoti</button>
        </div>

        <div>
            <label for="editable-input-arrival">Numatoma likusi siuntimo trukmė:</label>
            <input type="text" id="editable-input-arrival" value="2-3 dienos" class="form-control editable-input" readonly>
            <button onclick="enableEdit('editable-input-arrival', 'edit-btn-arrival', 'save-btn-arrival')">Redaguoti</button>
            <button onclick="saveChanges('editable-input-arrival', 'edit-btn-arrival', 'save-btn-arrival')">Išsaugoti</button>
        </div>

    </div>

    <!-- Add any additional content or scripts as needed -->
    <script>
        // Function to enable editing
        function enableEdit(inputId, editBtnId, saveBtnId) {
            document.getElementById(inputId).readOnly = false;
            document.getElementById(editBtnId).style.display = 'none';
            document.getElementById(saveBtnId).style.display = 'inline-block';
        }

        // Function to save changes
        function saveChanges(inputId, editBtnId, saveBtnId) {
            var inputValue = document.getElementById(inputId).value;

            // Perform any save action you need here (e.g., send data to a server)

            // Disable editing after saving
            document.getElementById(inputId).readOnly = true;
            document.getElementById(editBtnId).style.display = 'inline-block';
            document.getElementById(saveBtnId).style.display = 'none';
        }
    </script>
</body>
</html>
