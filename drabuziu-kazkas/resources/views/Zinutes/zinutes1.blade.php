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

        .message-container {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- Input for manually entering user ID -->
        <div>
            <label for="manualUserId">Enter User ID:</label>
            <input v-model="manualUserId" id="manualUserId" placeholder="Enter User ID">
            <button @click="getMessages">Get Messages</button>
        </div>

        <!-- Display existing messages -->
        <ul>
            <li v-for="message in messages" v-html="message.Turinys" class="message-container"></li>
        </ul>

        <!-- Fake text -->
        <div v-html="fakeText"></div>

        <!-- Input for new message and send button -->
        <div>
            <input v-model="newMessage" @keyup.enter="sendMessage" placeholder="Enter your message...">
            <button @click="sendMessageButton">Send Message</button>
        </div>

        <div>
            <a class="btn btn-primary" href="{{ route('meniu') }}">Meniu</a>
        </div>
    </div>

    <!-- Vue.js and Axios scripts -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                messages: [],       // Change to an array
                newMessage: '',
                fakeText: 'čia yra naujo pokalbio su administratoriumi pradžia',
                manualUserId: '',   // Added manualUserId for entering user ID manually
            },
            methods: {
                getMessages() {
                    axios.get('{{ route('messages.get') }}', {
                            params: {
                                userId: this.manualUserId  // Use manualUserId instead of selectedUserId
                            }
                        })
                        .then(response => {
                            console.log(response);  // Log the response
                            this.messages = response.data.messages || [];
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

                    axios.post('{{ route('messages.send') }}', {
                            Turinys: this.newMessage,
                            fk_Naudotojasid_Naudotojas: 1801
                        })
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
                },
            }
        });
    </script>
</body>

</html>
