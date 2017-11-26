<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';
    protected $fillable = ['id_message', 'id_conversation_from_conversation', 'id_sender', 'created_at', 'text'];
}
