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


use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if ($user = session()->get('user')) return redirect()->to("id$user->id_user");
    else return view('welcome')->with('msg','');
});

Route::get('/id{id}', [
    'uses' => 'UserController@getUsers'
]);

Route::get('/dashboard', [
    'as' => 'dashboard',
    'uses' => 'UserController@dashboard'
]);

Route::get('/login', function () {
    return redirect('/');
});

Route::post('/login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@postLogin'
]);

Route::get('/logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@getLogout'
]);

Route::get('/register', function () {
    return redirect('/');
});

Route::post('/register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@postRegister'
]);

Route::get('/registration', function () {
    return redirect()->to('/');
});

Route::post('/registration', [
    'as' => 'registration',
    'uses' => 'Auth\RegisterController@create'
]);

Route::get('/settings',[
    'uses' => 'ProfileController@getSettings'
]);

Route::post('/settings',[
    'as' => 'changeUserData',
    'uses' => 'ProfileController@changeData'
]);




//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

