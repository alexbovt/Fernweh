<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';
    protected $fillable = array('id_report', 'id_comment_from_comment_to_report', 'id_user_from_user_to_report', 'id_event_from_event_to_report', 'report_type', 'report_text', 'created_at', 'updated_at');

    public static function getReports()
    {
        return Report::select('report.*', 'comment.text', 'event.event_name', 'event.id_event', 'user.name', 'user.surname')
            ->join('comment', 'comment.id_comment', '=', 'id_comment_from_comment_to_report')
            ->join('user', 'user.id_user', '=', 'id_user_from_user_to_report')
            ->join('event', 'event.id_event', '=', 'id_event_from_event_to_report')
            ->get();
    }

    public static function reportComment($data)
    {
        return Report::create($data);
    }

    public static function acceptReport($id)
    {
        $id_comment = Report::where('id_report', $id)->pluck('id_comment_from_comment_to_report')->first();
        $comment = Comment::where('id_comment', $id_comment)->first();
        $data = [
            'id_user_from_user_to_comment' => $comment->id_user_from_user_to_comment,
            'id_event_from_event_to_comment' => $comment->id_event_from_event_to_comment,
            'id_comment' => $comment->id_comment
        ];
        Report::where('id_comment_from_comment_to_report', $id_comment)->delete();
        return Comment::deleteComment($data);

    }

    public static function deleteReport($id)
    {
        return Report::where('id_report', $id)->delete();
    }


}
