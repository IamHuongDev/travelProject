<?php

namespace App\Http\Controllers;

use App\Events\newMessage;
use App\Http\Requests\Partner\ChatRequest;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function indexChatVer1()
    {
        // $data = Chat::all();
        // return view('Partner.Chat_v1',compact('data'));
        return view('Partner.Chat_v1');
    }
    public function index()
    {
        return view('Partner.Chat');
    }

    public function sendMessageChatVer1(ChatRequest $request)
    {
        $user = Auth::guard('partner')->user();

        $chat = Chat::create([
            'user_id' =>    $user->id,
            'content' => $request->content,
        ]);

        broadcast(new newMessage($chat))->toOthers();

        return response()->json(['status' => true, 'chat' => $chat]);

    }

    public function deleteAll()
    {
        $data = Chat::all();

        foreach($data as $key => $value){
            $value->delete();
        }

        return response()->json(['data' => true]);
    }

    public function showMessageChatVer1()
    {
       $data = Chat::all();

        $user = Auth::guard('partner')->user();

       return response()->json(['data' => $data,'user' => $user->id]);
    }


}
