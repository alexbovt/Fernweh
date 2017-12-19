<?php

namespace App\Http\Controllers;

use App\Address;
use App\Comment;
use App\Event;
use App\EventPeopleList;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /*
    public function showEvents($city = null)
    {
        $user = session()->get("user");
        $attending_events = Event::getAttendingEvents($user->id_user);
        $organizing_events = Event::getOrganizingEvents($user->id_user);
        if ($city) {
            if (Address::where('city', $city)->first()) {
                $address = Address::where('city', $city)->first();
                $events = Event::getEvents($city, $user->id_address);
                if (count($events))
                    return view('events')->with(['events' => $events,
                        'user' => $user,
                        'address' => $address,
                        'attending_events' => $attending_events,
                        'organizing_events' => $organizing_events]);
                else return redirect()->back()
                    ->with('events_status', "No events in $city");
            } else {
                return redirect()->back()
                    ->with('events_status', "No city $city");
            }
        } else {
            $address = Address::getAddress($user->id_address);
            $events = Event::getEvents($city, $user->id_address);
            return view('events')->with(['events' => $events,
                'user' => $user,
                'address' => $address,
                'attending_events' => $attending_events,
                'organizing_events' => $organizing_events]);

        }
    }
    */

    public function showEvents()
    {
        $user = session()->get("user");
        $attending_events = Event::getAttendingEvents($user->id_user);
        $organizing_events = Event::getOrganizingEvents($user->id_user);
        $address = Address::getAddress($user->id_address);
        $events = Event::getEvents();
        return view('events')->with(compact('events', 'user', 'address', 'attending_events', 'organizing_events'));
    }

    public function showEventsInCity($city)
    {
        $user = session()->get("user");
        $attending_events = Event::getAttendingEvents($user->id_user);
        $organizing_events = Event::getOrganizingEvents($user->id_user);
        $address = Address::getAddress($user->id_address);
        $events = Event::getEventsInCity($city);
        return view('events')->with(compact('events', 'user', 'address', 'attending_events', 'organizing_events'));
    }

    public function getEvent($id)
    {
        $user = session()->get("user");
        $event = Event::where('id_event', $id)->first();
        $address = Address::where('id_address', $event->id_address_event)->first();
        $comments = Comment::showComment($id);
        $event_people_list = User::join('event_people_list', 'id_user', '=', 'event_people_list.id_user_from_user')
            ->join('address', 'user.id_address', '=', 'address.id_address')
            ->where('id_event_from_event', $event->id_event)
            ->get();
        if (EventPeopleList::where('id_event_from_event', $id)->where('id_user_from_user', $user->id_user)->first()) session(['attendance' => 'true']);
        else session(['attendance' => 'false']);
        if (Event::where('id_event', $id)->where('id_user', $user->id_user)->first()) {
            session(['creator' => 'true']);
        } else session(['creator' => 'false']);
        return view('event')->with(compact('event', 'user', 'address', 'event_people_list', 'comments'));
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

    public function createEvent(Request $request)
    {
        $id = session()->get("user")->id_user;
        $id_destination = null;
        $address = [
            'street' => null,
            'house' => null,
            'city' => $request->input('eventPlace'),
            'country' => 'Poland'
        ];
        if ($request->input('eventType') === 'travel') {
            $address_destination = [
                'street' => null,
                'house' => null,
                'city' => null,
                'country' => $request->input('destination')
            ];
            $id_destination = Address::addNewAddress($address_destination);
        }
        $data = [
            'id_user' => $id,
            'id_address_event' => Address::addNewAddress($address),
            'id_destination' => $id_destination,
            'event_name' => $request->input('eventTitle'),
            'arrive_date' => $request->input('arriveDate'),
            'depart_date' => $request->input('departDate'),
            'start_time' => $request->input('startTime'),
            'end_time' => $request->input('endTime'),
            'type' => $request->input('eventType'),
            'notes' => null
        ];
        Event::createEvent($data);
        return redirect()->back()->with('status', 'Success');
    }

    public function updateEvent($id)
    {
        dd($id);
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
