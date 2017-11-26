<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Support\Facades\Hash;

class User extends Model implements Authenticatable
{
    use AuthenticableTrait;
    protected $table  = 'user';
    protected $fillable = ['id_user','id_address','login','email','password','name','surname','birth_date','sex'];

    public static function registerUser($data){
        return User::create([
            'id_address' => $data['id_address'],
            'login' => $data['login'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'name' => $data['name'],
            'surname' => $data['surname'],
            'birth_date' => $data['birth_date'],
            'sex' => $data['sex'],
        ]);
    }

}
