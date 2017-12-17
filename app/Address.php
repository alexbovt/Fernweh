<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $fillable = array('country', 'city', 'street', 'house', 'flat');

    public static function addNewAddress($address)
    {
        if (!$address['street'] and !$address['house']) {
            $address['street'] = null;
            $address['house'] = null;
        }
        Address::create([
            'country' => $address['country'],
            'city' => $address['city'],
            'street' => $address['street'],
            'house' => $address['house']
        ]);
        return Address::where('country', $address['country'])
            ->where('city', $address['city'])
            ->orderBy('id_address', 'desc')
            ->pluck('id_address')
            ->first();
    }

    public static function getAddressByCity()
    {
        return Address::where()->get();
    }

    public static function getAddress($id_address)
    {
        return Address::where('id_address', $id_address)->first();
    }
}
