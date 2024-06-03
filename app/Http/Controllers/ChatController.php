<?php

namespace App\Http\Controllers;

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

    public function sendMessageChatVer1(ChatRequest $request)
    {
        $user = Auth::guard('partner')->user();

        Chat::create([
            'user_id' =>    $user->id,
            'content' => $request->content,
        ]);

        return response()->json(['status' => true]);

    }

    public function showMessageChatVer1()
    {
       $data = Chat::all();

       return response()->json(['data' => $data]);
    }


}
