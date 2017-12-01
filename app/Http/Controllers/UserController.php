<?php

namespace App\Http\Controllers;

use App\Address;
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
        if ($user->id_address == null) $address = Address::where('id_address', '1')->first();
        else {
            $address = Address::where('id_address', $user->id_address)->first();
            //$photo = Photo::where('id_user',$user->id_user)->first();
        }
        return view('profile')->with('user', $user)->with('address', $address);
        //->with('photo',$photo);
    }

    public function dashboard(Request $request)
    {
        if ($user = session()->get('user')) return redirect()->to("id$user->id_user");
    }
}
