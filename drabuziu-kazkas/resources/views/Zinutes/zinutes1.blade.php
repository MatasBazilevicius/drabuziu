<!-- resources/views/zinutes1.blade.php -->

@extends('layouts.app') {{-- Assuming you have a common layout file --}}

@section('content')
    <div id="admin-messages">
        <h1>Admin Messages</h1>

        <!-- Display list of users -->
        <ul>
            @foreach($users as $user)
                <li>
                    <a href="{{ route('admin.messages.user', ['user_id' => $user->id_Naudotojas]) }}">
                        {{ $user->username }}
                    </a>
                </li>
            @endforeach
        </ul>

        <!-- Display messages and reply form -->
        <div v-if="selectedUserId">
            <h2>Messages with {{ selectedUser.username }}</h2>

            <ul>
                <li v-for="message in messages">
                    {{ message.Turinys }}
                </li>
            </ul>

            <form @submit.prevent="reply">
                <textarea v-model="replyMessage" placeholder="Type your reply..."></textarea>
                <button type="submit">Send Reply</button>
            </form>
        </div>
    </div>
@endsection
