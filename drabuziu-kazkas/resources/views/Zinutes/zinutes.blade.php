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
        <!-- Display existing messages -->
        <ul>
            <li v-for="message in messages">@{{ message.Turinys }}</li>
        </ul>

        <!-- Input for new message and send button -->
        <div>
            <input v-model="newMessage" @keyup.enter="sendMessage" placeholder="Enter your message...">
            <button @click="sendMessageButton">Send Message</button>
        </div>
    </div>

    <!-- Vue.js and Axios scripts -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                messages: [],       // Array to store messages
                newMessage: '',      // Input for new message
            },
            mounted() {
                // Fetch initial messages
                this.getMessages();

                // Poll for new messages (example, you might want to use Laravel Echo for real-time updates)
                setInterval(this.getMessages, 3000);
            },
            methods: {
                getMessages() {
                    // Fetch messages directly from the server using the named route
                    axios.get('{{ route('messages.get') }}')
                        .then(response => {
                            this.messages = response.data;
                        })
                        .catch(error => {
                            console.error('Error fetching messages', error);
                        });
                },
                sendMessage() {
                    if (this.newMessage.trim() === '') {
                        alert('Please enter a message.');
                        return;
                    }

                    // Send a new message using the named route
                    axios.post('{{ route('messages.send') }}', { Turinys: this.newMessage, fk_Naudotojasid_Naudotojas: 1801 })
                        .then(response => {
                            this.newMessage = ''; // Clear the input
                            this.getMessages(); // Refresh messages
                        })
                        .catch(error => {
                            console.error('Error sending message', error);
                        });
                },
                sendMessageButton() {
                    this.sendMessage();
                }
            }
        });
    </script>
</body>
</html>
