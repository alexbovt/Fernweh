<?php

namespace App\Http\Controllers;

use App\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FriendsController extends Controller
{
    public function getFriends()
    {
        $user = Session::get('user');
        $friends = Friend::getFriends($user->id_user);
        return view('friends')->with('friends', $friends);
    }

    public function getRequests()
    {
        $user = Session::get('user');
        $friend_requests = Friend::getRequests($user->id_user);
        return view('requests')->with('friend_requests', $friend_requests);
    }
}
