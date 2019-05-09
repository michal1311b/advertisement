<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use App\Events\MessageSent;
use Notification;
use App\Notifications\PushDemo;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('chats');
    }
    public function fetchMessages()
    {
        return Message::with('user')->get();
    }
    public function sendMessage(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'message' => $request->message
        ]);
        broadcast(new MessageSent($message->load('user')))->toOthers();

        Notification::send(User::all(), new PushDemo);

        return ['status' => 'success'];
    }
}
