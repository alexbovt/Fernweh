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

Route::get('/', ['as' => 'welcome', function () {
    if ($user = session()->get('user')) return redirect()->to("id$user->id_user");
    else return view('welcome')->with('msg', '');
}]);

Route::get('/id{id}', [
    'uses' => 'UserController@getUser'
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

Route::get('/settings', [
    'uses' => 'ProfileController@getSettings'
]);

Route::post('/settings', [
    'as' => 'SettingsChangeUserData',
    'uses' => 'ProfileController@postSettings'
]);

Route::post('/account_delete', [
    'as' => 'DeleteAccount',
    'uses' => 'ProfileController@postDeleteAccount'
]);


Route::get('/edit', [
    'uses' => 'ProfileController@getEdit'
]);

Route::post('/edit', [
    'as' => 'EditChangeUserData',
    'uses' => 'ProfileController@postEdit'
]);


Route::get('/events/{city?}', [
    'as' => 'showEvents',
    'uses' => 'EventController@showEvents'
]);

Route::post('/events/createEvent', [
    'as' => 'createEvent',
    'uses' => 'EventController@createEvent'
]);

Route::get('/event_id{id}', [
    'uses' => 'EventController@getEvent'
]);

Route::get('/event_id{id}/join', [
    'uses' => 'EventController@joinEvent'
]);

Route::get('/event_id{id}/leave', [
    'uses' => 'EventController@leaveEvent'
]);

Route::post('/event_id{id}/update', [
    'as' => 'updateEvent',
    'uses' => 'EventController@updateEvent'
]);

Route::get('/event_id{id}/delete', [
    'uses' => 'EventController@deleteEvent'
]);

Route::post('/event_id{id}/addComment', [
    'as' => 'addComment',
    'uses' => 'CommentController@addComment'
]);

Route::get('/event_id{id}/deleteComment_id{id_comment}', [
    'as' => 'deleteComment',
    'uses' => 'CommentController@deleteComment'
]);

Route::post('/event_id{id}/reportComment_id{id_comment}', [
    'as' => 'reportComment',
    'uses' => 'CommentController@reportComment'
]);


Route::get('/messages', [
    'uses' => 'MessageController@getMessages'
]);

Route::get('/friends', [
    'uses' => 'FriendsController@getFriends'
]);

Route::get('/id{id}/sendRequest', [
    'uses' => 'FriendsController@sendFriendRequest'
]);

Route::get('/id{id}/deleteRequest', [
    'uses' => 'FriendsController@deleteFriendRequest'
]);

Route::get('/id{id}/addToFriends', [
    'uses' => 'FriendsController@addToFriends'
]);

Route::get('/id{id}/deleteFriend', [
    'uses' => 'FriendsController@deleteFromFriends'
]);


Route::get('/requests', [
    'uses' => 'FriendsController@getRequests'
]);
