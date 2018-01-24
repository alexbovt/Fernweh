<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    public function loginTest()
    {
        $credentials = [
            'inputLogin'    => 'Bratir19',
            'inputPassword' => '123123'
        ];
        $this->visit('/')
            ->submitForm('loginForm',  $credentials)
            ->post('/postLogin')
            ->andSee('/id56');
    }
}
