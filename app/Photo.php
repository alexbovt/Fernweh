<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = "photo";
    protected $fillable = array('id_photo', 'id_user', 'id_event', 'bitmap', 'min_bitmap', 'notes', 'created_at', 'updated_at');


    public static function getUserImage($id)
    {
        return Photo::where('id_user', $id)->first();
    }


    public static function getEventImage($id)
    {
        return Photo::where('id_event', $id)->first();
    }


    public static function postUserImage($image, $id)
    {
        return Photo::create([
            'id_user' => $id,
            'bitamap' => "usr=$id.jpg",
            'min_bimap' => "usr=$id.min.jpg",
            'notes' => 'notes',
        ]);
    }

    public static function postEventImage($image, $id)
    {
        return Photo::create([
            'id_event' => $id,
            'bitamap' => "evnt=$id.jpg",
            'min_bimap' => "evnt=$id.min.jpg",
            'notes' => 'notes',
        ]);
    }

}
