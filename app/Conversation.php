<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Conversation extends Model
{
    protected $table = 'conversation';
    protected $fillable = array('id_conversation', 'id_first', 'id_second', 'first_get_message', 'second_get_message');

    public static function getConversations($id)
    {
        return Conversation::select('conversation.*', 'user.id_user', 'user.name', 'user.surname')
            ->join('user', function ($join) use ($id) {
                $join->on('id_second', '=', 'id_user')->where('id_first', $id);
                $join->orOn('id_first', '=', 'id_user')->where('id_second', $id);
            })
            ->get();
    }

    public static function checkConversation($id_first, $id_second)
    {
        $id_conversation = Conversation::where('id_first', $id_first)
            ->where('id_second', $id_second)
            ->orWhere('id_first', $id_second)
            ->where('id_second', $id_first)
            ->pluck('id_conversation')
            ->first();
        if ($id_conversation) return $id_conversation;
        else return false;

    }

    public static function createConversation($id_first, $id_second)
    {
        Conversation::create([
            'id_first' => $id_first,
            'id_second' => $id_second,
            'first_get_message' => null,
            'second_get_message' => null
        ]);
        return Conversation::where('id_first', $id_first)
            ->where('id_second', $id_second)
            ->orderBy('id_conversation', 'desc')
            ->pluck('id_conversation');
    }

    public static function deleteConversation($id)
    {
        return Conversation::where('id_conversation', $id)->delete();
    }
}