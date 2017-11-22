<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table  = 'address';
    protected $fillable = ['country','city','street','house','flat'];

    public  static function getUserAddress($id_address){
        return Address::where('id_address', $id_address)->first();
    }
}
