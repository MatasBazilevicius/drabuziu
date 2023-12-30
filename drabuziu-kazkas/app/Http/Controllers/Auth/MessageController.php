<?php
// app/Http/Controllers/MessageController.php
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $validatedData = $request->validate([
            'Turinys' => 'required|string|max:255',
        ]);

        $message = Message::create([
            'Turinys' => $validatedData['Turinys'],
            // ... other fields if necessary
        ]);

        return response()->json($message, 201); // 201 Created status code
    }
}
