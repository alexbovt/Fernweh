<?php

namespace App\Http\Controllers;

use App\Address;
use App\Event;
use App\Friend;
use App\User;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function getUser($id_user)
    {
        $user = User::where('id_user', $id_user)->first();
        if(!$user) abort(404);
        $userPhoto = Photo::getUserImage(intval($user->id_user));
        $address = Address::where('id_address', $user->id_address)->first();
        $friends = Friend::getFriends($id_user);
        $events = Event::getAttendingEvents($id_user);
        if ($id_user == session()->get('user')->id_user) {
            $statusFriend = null;
        } else {
            $statusFriend = Friend::checkFriend(session()->get('user')->id_user, $id_user);
        }
        //$user->photo = $userPhoto->imagePath;
        //$user->minPhoto = $userPhoto->minImagePath;
        if ($user->profile_status === 'admin' and session()->get('user')->profile_status === 'admin')
            return redirect()->to('/admin');

        return view('profile')->with(compact('user', 'address', 'friends', 'events', 'statusFriend', 'userPhoto'));
    }

    public function dashboard(Request $request)
    {
        if ($user = session()->get('user')) return redirect()->to("id$user->id_user");
    }
}
