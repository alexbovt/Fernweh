<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Event;
use App\Address;


class SearchController extends Controller
{

    public function search(Request $request)
    {
        $user = session()->get("user");
        $attending_events = Event::getAttendingEvents($user->id_user);
        $organizing_events = Event::getOrganizingEvents($user->id_user);
        $address = Address::getAddress($user->id_address);
        $request = $request->input('search');
        $foundEvents = Event::getEventsInCity($request);
        $foundUsers = User::getUsers($request);
        $events = $foundEvents + $foundUsers;
        return view('events')->with(compact('events', 'user', 'address', 'attending_events', 'organizing_events'));
    }
}

/*
        $city = $request->input('search');
        return redirect()->to("/events/$city");
        */