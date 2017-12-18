<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function getConversations()
    {
        $user = session()->get('user');
        $conversations = Conversation::getConversations($user->id_user);
        return view('messages')->with(compact('conversations'));
    }

    public function getMessages($id)
    {
        $user = session()->get('user');
        $messages = Message::getMessagesFromConversation($id);
        dd($messages);
    }

    public function sendMessage(Request $request)
    {
        $user = session()->get('user');
        $data = [
            'id_conversation_from_conversation' => 1,
            'id_sender' => $user->id_user,
            'text' => $request->input('text'),
        ];
        Message::sendMessage($data);
        return redirect()->refresh();
    }

    public function createConversationIfNotExist($id)
    {
        $user = session()->get('user');
        if ($user->id_user === intval($id)) return redirect()->back();
        if (!$id_conversation = Conversation::checkConversation($user->id_user, intval($id))) {
            $id_newConversation = Conversation::createConversation($user->id_user, $id);
            return redirect("/messages?sel=$id_newConversation");
        } else return redirect("/messages?sel=$id_conversation");
    }

}
