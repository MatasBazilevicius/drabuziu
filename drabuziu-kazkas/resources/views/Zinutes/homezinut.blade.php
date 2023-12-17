<?php
// Start the PHP session
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // Include database connection file
    include 'app/db.conn.php';

    // Include helper functions for user-related operations
    include 'app/helpers/user.php';

    // Include helper functions for conversation-related operations
    include 'app/helpers/conversations.php';

    // Get user data based on the current session
    $user = getUser($_SESSION['username'], $conn);

    // Get user conversations
    $conversations = getConversation($user['user_id'], $conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="p-2 w-400 rounded shadow">
        <div>
            <!-- Search input and button -->
            <div class="input-group mb-3">
                <input type="text" placeholder="Search..." id="searchText" class="form-control">
                <button class="btn btn-primary" id="searchBtn"><i class="fa fa-search"></i></button>
            </div>
            
            <!-- List of user conversations -->
            <ul id="chatList" class="list-group mvh-50 overflow-auto">
                <?php if (!empty($conversations)) { ?>
                    <?php foreach ($conversations as $conversation) { ?>
                        <li class="list-group-item">
                            <!-- Link to individual chat with a user -->
                            <a href="chat.php?user=<?=$conversation['username']?>" class="d-flex justify-content-between align-items-center p-2">
                                <div class="d-flex align-items-center">
                                    <!-- User profile picture -->
                                    <img src="uploads/<?=$conversation['p_p']?>" class="w-10 rounded-circle">
                                    <!-- User name -->
                                    <h3 class="fs-xs m-2"><?=$conversation['name']?></h3>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                <?php } else { ?>
                    <!-- Displayed if there are no conversations -->
                    <div class="alert alert-info text-center">
                        <i class="fa fa-comments d-block fs-big"></i>
                        No messages yet, Start the conversation
                    </div>
                <?php } ?>
            </ul>
        </div>
    </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // jQuery document ready function
        $(document).ready(function(){
            // Handle input in the search bar ....
            $("#searchText").on("input", function(){
                var searchText = $(this).val();
                if(searchText == "") return;
                $.post('app/ajax/search.php', { key: searchText }, function(data, status){
                    $("#chatList").html(data);
                });
            });

            // Handle click on the search button
            $("#searchBtn").on("click", function(){
                var searchText = $("#searchText").val();
                if(searchText == "") return;
                $.post('app/ajax/search.php', { key: searchText }, function(data, status){
                    $("#chatList").html(data);
                });
            });
        });
    </script>
</body>
</html>

<?php
} else {
    // Redirect to the login page if not logged in
    header("Location: index.php");
    exit;
}
?>
