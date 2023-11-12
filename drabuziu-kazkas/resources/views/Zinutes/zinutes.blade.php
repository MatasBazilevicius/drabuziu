<!-- resources/views/messages/customer-support.blade.php -->

@extends('layouts.app') {{-- Assuming you have a layout file --}}

@section('content')
<div class="container">
    <h1>Klientų pagalba</h1>

    <style>
    .previous-messages {
        padding: 40px;
    }
    </style>

<style>
    .previous-messages {
        padding: 10px;
        border: 2px solid #ccc; /* Add a 1px solid border with a light gray color */
    }

    .previous-messages textarea {
        border: 2px solid #ccc; /* Add a border to the textarea within the "previous-messages" div */
    }
</style>
    <div class="chat-container">
        <div class="previous-messages">
        
            <h2>   </h2>
            <textarea
                class="form-control"
                rows="5"
                readonly
            >Kuo galėčiau padėti?</textarea>
        </div>

        <div class="chat-messages">
            {{-- Display previous messages here if needed --}}
        </div>

        <form action="{{ route('meniu') }}" method="post">
            @csrf
            <div class="form-group d-flex">
                <label for="message" class="sr-only"></label>
                <textarea
                    name="message"
                    id="message"
                    rows="3"
                    class="form-control"
                    placeholder="Your Message..."
                    oninput="checkInput()"
                    required
                ></textarea>

                <button type="submit" class="btn btn-success ml-2">Send</button>

            </div>
        </form>
    </div>
</div>

<script>
    function checkInput() {
        var messageInput = document.getElementById('message');
        var placeholderLabel = document.querySelector('label[for="message"]');

        if (messageInput.value.trim() !== '') {
            placeholderLabel.style.display = 'none';
        } else {
            placeholderLabel.style.display = 'block';
        }
    }

    // Trigger checkInput on page load to handle pre-filled messages
    checkInput();
</script>
@endsection
