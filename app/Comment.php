<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = ['id_comment', 'id_user_from_user_to_comment', 'id_event_from_event_to_comment', 'text', 'created_at', 'updated_at'];


    public static function showComment($id)
    {
        return Comment::join('user', 'user.id_user', '=', 'id_user_from_user_to_comment')
            ->where('id_event_from_event_to_comment', $id)
            ->select('comment.*', 'user.id_user', 'user.name', 'user.surname')
            ->get();
    }

    public static function createComment($data)
    {
        return Comment::create([
            'id_user_from_user_to_comment' => $data['id_user_from_user_to_comment'],
            'id_event_from_event_to_comment' => $data['id_event_from_event_to_comment'],
            'text' => $data['text']
        ]);
    }


    public static function deleteComment($data)
    {
        return Comment::where('id_user_from_user_to_comment', $data['id_user_from_user_to_comment'])
            ->where('id_event_from_event_to_comment', $data['id_event_from_event_to_comment'])
            ->where('id_comment', $data['id_comment'])->delete();
    }
}
