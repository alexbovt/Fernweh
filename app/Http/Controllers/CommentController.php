<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public static function addComment($id, Request $request)
    {
        $user = session()->get("user");
        $data = [
            'id_user_from_user_to_comment' => $user->id_user,
            'id_event_from_event_to_comment' => $id,
            'text' => $request->input('inputComment')
        ];
        Comment::createComment($data);
        return redirect()->back()->with('status', 'Your comment has been added');
    }

    public static function reportComment()
    {

    }

    public static function deleteComment($id, $id_comment)
    {
        $user = session()->get("user");
        $data = [
            'id_user_from_user_to_comment' => $user->id_user,
            'id_event_from_event_to_comment' => $id,
            'id_comment' => $id_comment
        ];
        Comment::deleteComment($data);
        return redirect()->back()->with('status', 'Your comment has been deleted');
    }
}
