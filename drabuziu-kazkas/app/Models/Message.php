<?php

class MessageController extends Controller
{
    public function index()
    {
        // Retrieve messages
        $messages = Message::all();
        return response()->json($messages);
    }

    public function store(Request $request)
    {
        // Store a new message
        $message = Message::create($request->all());
        return response()->json($message);
    }
}