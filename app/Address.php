<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $fillable = array('country', 'city', 'street', 'house', 'flat');

    public static function addNewAddress($address)
    {
        Address::create([
            'country' => $address['country'],
            'city' => $address['city']
        ]);
        return Address::where('country', $address['country'])
            ->where('city', $address['city'])
            ->orderBy('id_address', 'desc')
            ->pluck('id_address')
            ->first();
    }

    public static function getAddress($id_address)
    {
        return Address::where('id_address', $id_address)->first();
    }
}
