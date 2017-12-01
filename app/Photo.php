<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = "photo";
    protected $fillable = array('id_photo', 'id_user', 'id_event', 'bitmap', 'min_bitmap', 'notes', 'created_at', 'updated_at');
}
