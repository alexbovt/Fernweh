<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $fillable = ['id_event', 'id_user', 'id_address_event', 'id_destination', 'id_photo', 'event_name', 'created_at', 'duration', 'coordination', 'type'];


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

    }
}

