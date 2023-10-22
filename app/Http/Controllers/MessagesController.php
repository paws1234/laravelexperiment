<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessagesController extends Controller
{
    public function sendMessage(Request $request)
{
    $message = Message::create([
        'sender_id' => auth()->id(),
        'receiver_id' => $request->receiver_id,
        'message' => $request->message,
    ]);

    return response()->json(['message' => 'Message sent successfully']);
}

public function getMessages(Request $request)
{
    try {
        $receiverId = $request->receiver_id;
        $senderId = auth()->id();

        $messages = Message::where(function ($query) use ($receiverId, $senderId) {
            $query->where('receiver_id', $receiverId)->where('sender_id', $senderId);
        })->orWhere(function ($query) use ($receiverId, $senderId) {
            $query->where('receiver_id', $senderId)->where('sender_id', $receiverId);
        })->with('sender')->get();

        return response()->json(['messages' => $messages]);
    } catch (\Exception $e) {
      
        Log::error('Error retrieving messages:', ['exception' => $e]);

        return response()->json(['error' => 'Failed to retrieve messages.'], 500);
    }
}

    

    
    
}
