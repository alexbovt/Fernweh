<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::guest()) {
        return view('welcome');
    } else return redirect("id2)");
});


Route::get('/id{id}', [
   'uses' => 'UserController@getUsers'
]);

Route::post('/login',[
    'as' => 'login',
   'uses' =>'Auth\LoginController@postLogin'
]);


Route::post('/register',[
    'as' => 'register',
    'uses' =>'Auth\RegisterController@postRegister'
]);




//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

