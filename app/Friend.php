<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = 'friends';
    protected $fillable = array('id_first_friend', 'id_second_friend', 'status');

    public static function getFriends($id)
    {
        return Friend::select('friends.*', 'user.name')
            ->where('status', 'friend')
            ->join('user', function ($join) use ($id) {
                $join->on('id_second_friend', '=', 'id_user')->where('id_first_friend', $id);
                $join->orOn('id_first_friend', '=', 'id_user')->where('id_second_friend', $id);

            })
            ->get();
    }

    public static function getRequests($id)
    {
        return Friend::select('friends.*', 'user.name')
            ->join('user', 'id_first_friend', '=', 'id_user')
            ->where('id_second_friend', $id)
            ->where('status', 'request')
            ->get();
    }

    public static function checkFriend($id)
    {
        return $id;
    }

    public static function sendRequest($id)
    {
        return $id;
    }

    public static function addFriend($id)
    {
        return $id;
    }

    public static function deleteFriend($id)
    {
        return $id;
    }

    public static function deleteRequest($id)
    {
        return $id;
    }
}
