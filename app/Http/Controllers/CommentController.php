<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Report;
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


    public static function reportComment($id, $id_comment, Request $request)
    {
        $user = session()->get("user");
        $data = [
            'id_user_from_user_to_report' => intval($user->id_user),
            'id_event_from_event_to_report' => intval($id),
            'id_comment_from_comment_to_report' => intval($id_comment),
            'report_type' => $request->input('report_type'),
            'report_text' => $request->input('report_text')
        ];
        Report::reportComment($data);
        return redirect()->back()->with('status', 'Comment has been reported');
    }
}
