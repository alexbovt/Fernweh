<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function showEvents()
    {
        return view('event')->with('user', session()->get("user"));
    }
}
