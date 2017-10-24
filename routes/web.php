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
    } else return view('profile');
});

Route::get('/login/{login}/{password}',
    [
        'uses' => 'Auth/LoginController@authenticate'
    ]);

Route::get('/profile', [
    'uses' => 'UserController@getUsers'
]);

/*
Route::get('/profile', function () {
    if (!Auth::guest()) {
        return redirect('/');
    } else return view('profile');
});
/*
 *
 */
Route::get('/messages', function () {
    if (Auth::guest()) {
        return redirect('/');
    } else return view('messages');
});

Route::get('/settings', function () {
    if (Auth::guest()) {
        return redirect('/');
    } else return view('settings');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
