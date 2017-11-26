<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FriendsController extends Controller
{
    public function getFriends()
    {
        return view('friends');
    }
}
