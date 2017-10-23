<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::where('id_user', '=', '2')->get();
        return view('profile', ['users' => $users]);
    }
}
