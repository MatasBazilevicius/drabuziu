<!-- resources/views/messages.blade.php -->

<div id="app">
    <ul>
        <li v-for="message in messages">@{{ message.Turinys }}</li>
    </ul>
    <input v-model="newMessage" @keyup.enter="sendMessage">
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    new Vue({
        el: '#app',
        data: {
            messages: [],
            newMessage: '',
        },
        mounted() {
            // Fetch initial messages
            this.fetchMessages();

            // Poll for new messages (example, you might want to use Laravel Echo for real-time updates)
            setInterval(this.fetchMessages, 3000);
        },
        methods: {
            fetchMessages() {
                // Fetch messages from the server
                axios.get('/messages')
                    .then(response => {
                        this.messages = response.data;
                    })
                    .catch(error => {
                        console.error('Error fetching messages', error);
                    });
            },
            sendMessage() {
                // Send a new message
                axios.post('/messages', { Turinys: this.newMessage })
                    .then(response => {
                        this.newMessage = ''; // Clear the input
                        this.fetchMessages(); // Refresh messages
                    })
                    .catch(error => {
                        console.error('Error sending message', error);
                    });
            }
        }
    });
</script>
