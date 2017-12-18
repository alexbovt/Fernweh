<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';
    protected $fillable = array('id_message', 'id_conversation_from_conversation', 'id_sender', 'created_at', 'text');

    public static function getMessagesFromConversation($id)
    {
        return Message::where('id_conversation_from_conversation', $id)->oderdBy('created_at', 'asc')->get();
    }

    public static function sendMessage($data)
    {
        return Message::create([
            'id_conversation_from_conversation' => $data['id_conversation'],
            'id_sender' => $data['id_sender'],
            'text' => $data['text']
        ]);
    }
}
