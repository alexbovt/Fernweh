<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Conversation;


class Message extends Model
{
    protected $table = 'message';
    protected $fillable = array('id_message', 'id_conversation_from_conversation', 'id_sender', 'created_at', 'text');

    public static function getMessagesFromConversation($id)
    {
        return Message::where('id_conversation_from_conversation', $id)->orderBy('created_at', 'asc')->get();
    }

    public static function getCompanion($id)
    {
        return Conversation::select('user.id_user', 'user.name', 'user.surname')
            ->where('id_conversation', $id)
            ->join('user', function ($join) use ($id) {
                $join->on('id_second', '=', 'id_user')->where('id_first', session()->get('user')->id_user);
                $join->orOn('id_first', '=', 'id_user')->where('id_second', session()->get('user')->id_user);
            })
            ->first();
    }


    public static function sendMessage($data)
    {
        return Message::create([
            'id_conversation_from_conversation' => $data['id_conversation_from_conversation'],
            'id_sender' => $data['id_sender'],
            'text' => $data['text']
        ]);
    }
}
