<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table  = 'conversation';
    protected $fillable = ['id_conversation','id_first','id_second','first_get_message','second_get_message'];
}
