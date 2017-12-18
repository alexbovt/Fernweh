<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = 'friends';
    protected $fillable = array('id_first_friend', 'id_second_friend', 'status');

    public static function getFriends($id)
    {
        return Friend::select('friends.*', 'user.*')
            ->where('status', 'friend')
            ->join('user', function ($join) use ($id) {
                $join->on('id_second_friend', '=', 'id_user')->where('id_first_friend', $id);
                $join->orOn('id_first_friend', '=', 'id_user')->where('id_second_friend', $id);
            })
            ->get();
    }

    public static function getRequests($id)
    {
        return Friend::select('friends.*', 'user.*')
            ->join('user', 'id_first_friend', '=', 'id_user')
            ->where('id_second_friend', $id)
            ->where('status', 'request')
            ->get();
    }

    public static function checkFriend($id_user, $id)
    {
        if (Friend::where('id_first_friend', $id_user)
            ->where('id_second_friend', $id)
            ->where('status', 'friend')
            ->orWhere('id_first_friend', $id)
            ->where('id_second_friend', $id_user)
            ->where('status', 'friend')
            ->first()) return true;
        else return false;
    }

    public static function sendRequest($id_user, $id)
    {
        return Friend::create([
            'id_first_friend' => $id_user,
            'id_second_friend' => $id,
            'status' => 'request'
        ]);
    }

    public static function addFriend($id_user, $id)
    {
        return Friend::where('id_second_friend', $id_user)
            ->where('id_first_friend', $id)
            ->update([
                'status' => 'friend'
            ]);
    }

    public static function deleteFriend($id_user, $id)
    {
        return Friend::where('id_first_friend', $id_user)
            ->where('id_second_friend', $id)
            ->where('status', 'friend')
            ->orWhere('id_first_friend', $id)
            ->where('id_second_friend', $id_user)
            ->where('status', 'friend')
            ->delete();
    }

    public static function deleteRequest($id_user, $id)
    {
        return Friend::where('id_second_friend', $id_user)
            ->where('id_first_friend', $id)
            ->where('status', 'request')
            ->delete();
    }
}
