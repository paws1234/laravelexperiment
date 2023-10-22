<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Controllers\MessagesController;
class ChatController extends Controller
{
    public function index()
{
   
    $messages = Message::all();
 
    $otherUsers = User::where('id', '!=', auth()->user()->id)->get();

    return view('chat', compact('messages', 'otherUsers'));


    
}
}