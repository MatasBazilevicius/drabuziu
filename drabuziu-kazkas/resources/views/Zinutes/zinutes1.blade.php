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
        <!-- Display existing messages -->
        <ul>
            <li v-for="message in messages" v-html="message.Turinys" class="message-container"></li>
        </ul>

        <div>
            <label for="userDropdown">Select User:</label>
            <select v-model="selectedUserId" @change="fetchUserMessages" id="userDropdown">
                <option v-for="user in users" :key="user.id" :value="user.id">{{ user.id_Naudotojas }}</option>
            </select>
        </div>

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
                fakeText: 'Bandom',
                selectedUserId: null,
                users: [], // Array to store user data
            },
            mounted() {
                // Fetch initial messages
                this.getMessages();

                // Fetch users for the dropdown
                this.getUsers();

                // Poll for new messages (example, you might want to use Laravel Echo for real-time updates)
                setInterval(this.getMessages, 3000);
            },
            methods: {
                getMessages() {
                    axios.get('{{ route('messages.get') }}')
                        .then(response => {
                            console.log(response);  // Log the response
                            this.messages = response.data.messages || [];
                        })
                        .catch(error => {
                            console.error('Error fetching messages', error);
                        });
                },

                getUsers() {
                    axios.get('{{ route('users.get') }}')
                        .then(response => {
                            this.users = response.data.users || [];
                        })
                        .catch(error => {
                            console.error('Error fetching users', error);
                        });
                },

                fetchUserMessages() {
                    // Fetch messages for the selected user
                    if (this.selectedUserId) {
                        axios.get('{{ route('messages.user', ['userId' => '']) }}/' + this.selectedUserId)
                            .then(response => {
                                this.messages = response.data.messages || [];
                            })
                            .catch(error => {
                                console.error('Error fetching user messages', error);
                            });
                    }
                },

                sendMessage() {
                    if (this.newMessage.trim() === '' || !this.selectedUserId) {
                        alert('Please enter a message and select a user.');
                        return;
                    }

                    axios.post('{{ route('messages.send') }}', {
                            Turinys: this.newMessage,
                            fk_Naudotojasid_Naudotojas: this.selectedUserId
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
