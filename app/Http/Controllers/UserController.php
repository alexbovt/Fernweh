<?php

namespace App\Http\Controllers;

use App\User;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function getUsers($id_user)
    {
        $user = User::where('id_user', $id_user)->first();
        //$user_photos = Photo::findAll()->where('id_user',$id_user)
        return view('profile')->with('user',$user);
            //->with('user_photos',$user_photos)

    }

    public function dashboard(Request $request){
        if($user = session()->get('user')) return redirect()->to("id$user->id_user");
    }
}
