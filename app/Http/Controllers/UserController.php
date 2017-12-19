<?php

namespace App\Http\Controllers;

use App\Address;
use App\Event;
use App\Friend;
use App\User;
use App\Photo;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function getUser($id_user)
    {
        $user = User::where('id_user', $id_user)->first();
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
        return view('profile')->with(compact('user', 'address', 'friends', 'events', 'statusFriend', 'userPhoto'));
        /*
        ->with('address', $address)
        ->with('friends', $friends)
        ->with('events', $events)
        ->with('statusFriend', $statusFriend);
*/
    }

    public function dashboard(Request $request)
    {
        if ($user = session()->get('user')) return redirect()->to("id$user->id_user");
    }
}
