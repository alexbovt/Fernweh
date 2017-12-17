<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $fillable = array('id_event', 'id_user', 'id_address_event', 'id_destination', 'id_photo', 'event_name', 'arrive_date', 'depart_date', 'start_time', 'end_time', 'coordination', 'type', 'notes');

    /*
    public static function getEvents($city, $id_address)
    {
        if ($city) {
            return Event::join('address', 'id_address_event', '=', 'id_address')
                ->where('city', $city)
                ->get();
        } else
            return Event::join('address', 'id_address_event', '=', 'id_address')
                ->where('id_address', $id_address)
                ->get();
    }
    */
    public static function getEvents()
    {
        return Event::join('address', 'event.id_address_event', '=', 'address.id_address')
            ->where('address.city', Address::getAddress(session()->get("user")->id_address)->city)
            ->get();
    }

    public static function getEventsInCity($city)
    {

    }

    public static function getAttendingEvents($id_user)
    {
        return Event::rightjoin('event_people_list', 'id_event', '=', 'event_people_list.id_event_from_event')
            ->where('event_people_list.id_user_from_user', $id_user)
            ->get();

    }

    public static function getOrganizingEvents($id_user)
    {
        return Event::where('id_user', $id_user)->get();
    }

    public static function createEvent($data)
    {
        return Event::create([
            'id_user' => $data['id_user'],
            'id_address_event' => $data['id_address_event'],
            'id_destination' => $data['id_destination'],
            //'id_photo',
            'event_name' => $data['event_name'],
            //'created_at',
            'arrive_date' => $data['arrive_date'],
            'depart_date' => $data['depart_date'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
            //'coordination',
            'type' => $data['type'],
            'notes' => $data['notes']
        ]);
    }

    public static function editEvent($data)
    {

    }

    public static function deleteEvent($data)
    {

    }
}

