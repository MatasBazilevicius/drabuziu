<!-- resources/views/select_user.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select User</title>
</head>

<body>

    <h2>Select User</h2>

    <form action="" method="post">
        @csrf

        <label for="userDropdown">Select User:</label>
        <select name="user_id" id="userDropdown">
            @foreach ($userIds as $userId)
                <option value="{{ $userId }}">{{ $userId }}</option>
            @endforeach
        </select>

        <br>

        <input type="submit" value="Submit">
    </form>

</body>

</html>
