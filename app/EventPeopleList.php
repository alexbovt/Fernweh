<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPeopleList extends Model
{
    protected $table = 'event_people_list';
    protected $fillable = array('id_event_from_event', 'id_user_from_user');
}
