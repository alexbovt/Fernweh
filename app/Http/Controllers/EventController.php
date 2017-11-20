<?php

namespace App\Http\Controllers;

use App\Address;
use App\Event;
use App\EventPeopleList;
use App\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function showEvents($city = null)
    {
        $user = session()->get("user");
        $attending_events = Event::join('event_people_list', 'id_user', '=', 'id_user_from_user')
            ->where('id_user_from_user', $user->id_user)
            ->get();
        $organizing_events = Event::where('id_user', $user->id_user)->get();
        if ($city) {
            if (Address::where('city', $city)->first()) {
                $events = Event::join('address', 'id_address_event', '=', 'id_address')->where('city', $city)->get();
                $address = Address::where('city', $city)->first();
                if ($events)
                    return view('events')
                        ->with('events', $events)
                        ->with('user', $user)
                        ->with('address', $address)
                        ->with('attending_events', $attending_events)
                        ->with('organizing_events', $organizing_events);
                else return redirect()->back()
                    ->with('events_status', "No events in $city")
                    ->with('city', $city)
                    ->with('attending_events', $attending_events)
                    ->with('organizing_events', $organizing_events);

            } else {
                return redirect()->back()
                    ->with('events_status', "No city $city")
                    ->with('city', $city)
                    ->with('attending_events', $attending_events)
                    ->with('organizing_events', $organizing_events);
            }
        } else {
            $events = Event::join('address', 'id_address_event', '=', 'id_address')
                ->where('id_address', $user->id_address)
                ->get();
            $address = Address::where('id_address', $user->id_address)->first();
            return view('events')
                ->with('events', $events)
                ->with('user', $user)
                ->with('address', $address)
                ->with('attending_events', $attending_events)
                ->with('organizing_events', $organizing_events);
        }
    }

    public function getEvent($id)
    {
        $user = session()->get("user");
        $event = Event::where('id_event', $id)->first();
        $address = Address::where('id_address', $event->id_address_event)->first();
        $event_people_list = User::join('event_people_list', 'id_user', '=', 'event_people_list.id_user_from_user')
            ->join('address', 'user.id_address', '=', 'address.id_address')
            ->where('id_event_from_event', $event->id_event)
            ->get();
        if (EventPeopleList::where('id_event_from_event', $id)->where('id_user_from_user', $user->id_user)->first()) session(['attendance' => 'true']);
        else session(['attendance' => 'false']);
        if (Event::where('id_event', $id)->where('id_user', $user->id_user)->first()) {
            session(['attendance' => 'creator']);
            session(['creator' => 'true']);
        } else session(['creator' => 'false']);
        return view('event')
            ->with('event', $event)
            ->with('user', $user)
            ->with('address', $address)
            ->with('event_people_list', $event_people_list);
    }


    public function joinEvent($id)
    {
        $user = session()->get("user");
        if (!EventPeopleList::where('id_event_from_event', $id)->where('id_user_from_user', $user->id_user)->first()) {
            EventPeopleList::create([
                'id_event_from_event' => $id,
                'id_user_from_user' => $user->id_user,
            ]);
        }
        return redirect()->back();
    }

    public function leaveEvent($id)
    {
        $user = session()->get("user");
        if (EventPeopleList::where('id_event_from_event', $id)->where('id_user_from_user', $user->id_user)->first()) {
            EventPeopleList::where('id_event_from_event', $id)
                ->where('id_user_from_user', $user->id_user)
                ->delete();
        }
        return redirect()->back();
    }

    public function createEvent()
    {
        echo 'hello';
    }

    public function editEvent($id)
    {
        echo 'hello';
    }

    public function updateEvent($id)
    {
        echo 'hello';
    }

    public function deleteEvent($id)
    {
        $user = session()->get("user");
        if (Event::where('id_event', $id)->where('id_user', $user->id_user)->first()) {
            EventPeopleList::where('id_event_from_event', $id)->delete();
            Event::where('id_event', $id)->delete();
        }
        return redirect()->to('/events')->with('status', 'Event has been deleted!!');
    }
}
