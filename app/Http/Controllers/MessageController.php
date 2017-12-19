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
        $messages = null;
        return view('messages')->with(compact('conversations', 'messages'));
    }

    public function getMessages($id)
    {
        $user = session()->get('user');
        $conversations = Conversation::getConversations($user->id_user);
        $messages = Message::getMessagesFromConversation($id);
        $companion = Message::getCompanion($id);
        return view('messages')->with(compact('conversations', 'messages', 'companion'));
    }

    public function sendMessage($id, Request $request)
    {
        $user = session()->get('user');
        $data = [
            'id_conversation_from_conversation' => $id,
            'id_sender' => $user->id_user,
            'text' => $request->input('inputMessage'),
        ];
        Message::sendMessage($data);
        return redirect()->back();
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


    public static function createConversationWithMessage($id, Request $request)
    {
        $user = session()->get('user');
        if ($id_conversation = Conversation::checkConversation($user->id_user, intval($id))) {
            $data = [
                'id_conversation_from_conversation' => intval($id_conversation),
                'id_sender' => $user->id_user,
                'text' => $request->input('messageText')

            ];
        } else {
            $id_newConversation = Conversation::createConversation($user->id_user, intval($id));
            $data = [
                'id_conversation_from_conversation' => intval($id_newConversation),
                'id_sender' => $user->id_user,
                'text' => $request->input('messageText')
            ];
        }
        Message::sendMessage($data);
        return redirect()->back();
    }

}
