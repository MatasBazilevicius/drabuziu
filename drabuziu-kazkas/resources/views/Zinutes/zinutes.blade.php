<!-- resources/views/messages.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>

    <style>
        #app {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #app div {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
        }

        #app input {
            width: 300px; /* Adjust the width as needed */
        }
    </style>
</head>
<body>

<div id="app">
    <ul>
        <li v-for="message in messages">@{{ message.Turinys }}</li>
    </ul>
    <div>
        <input v-model="newMessage" @keyup.enter="sendMessage" placeholder="Enter your message...">
        <button @click="sendMessageButton">Send Message</button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // Vue.js script goes here...
</script>

</body>
</html>
