<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table  = 'event';
    protected $fillable = ['id_event','id_user','id_address_event','id_destination','id_photo','event_name','created_at','duration','coordination','type'];
}
