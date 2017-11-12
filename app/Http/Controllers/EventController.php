<?php

namespace App\Http\Controllers;

use App\Address;
use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function showEvents($city = null)
    {
        $user = session()->get("user");
        if ($city) {
            if (Address::where('city', $city)->first()) {
                $events = Event::join('address', 'id_address_event', '=', 'id_address')->where('city', $city)->get();
                $address = Address::where('city', $city)->first();
                if ($events)
                    return view('events')->with('events', $events)->with('user', $user)->with('address', $address);
                else return redirect()->back()->with('events_status', "No events in $city")->with('city', $city);

            } else {
                return redirect()->back()->with('events_status', "No city $city")->with('city', $city);
            }
        } else {
            $events = Event::join('address', 'id_address_event', '=', 'id_address')
                ->where('id_address', $user->id_address)
                ->get();
            $address = Address::where('id_address', $user->id_address)->first();
            return view('events')->with('events', $events)->with('user', $user)->with('address', $address);

        }
    }

    public function getEvent($id)
    {
        $user = session()->get("user");
        $event = Event::where('id_event', $id)->first();
        $address = Address::where('id_address', $event->id_address_event)->first();
        return view('event')->with('event', $event)->with('user', $user)->with('address', $address);
    }
}
