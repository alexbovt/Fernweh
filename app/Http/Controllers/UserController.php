<?php

namespace App\Http\Controllers;

use App\User;
use App\Photo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers($id_user)
    {
        $user = User::where('id_user', $id_user)->first();
        //$user_photos = Photo::findAll()->where('id_user',$id_user)
        return view('profile')->with('user',$user);
            //->with('user_photos',$user_photos)
    }
}
