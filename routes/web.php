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
use Laravel\User;

Route::get('/', function () {
	$users = User::all();
    return view('welcome', compact('users'));

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tweets', 'UserController@tweets')->name('tweets')->middleware('auth');

Route::get('/profile', 'UserController@profile')->name('profile')->middleware('auth');

Route::post('/profile', 'UserController@update_avatar');

Route::get('UserImage', 'UserController@user_image')->name('user_image');
Route::get('/produccion', 'Controller@prod')->name('prod');

Route::get('/chat', 'ChatController@index')->middleware('auth')->name('chat');
Route::get('/chat/{id}', 'ChatController@show')->middleware('auth')->name('chat.show');
Route::post('/chat/getChat/{id}', 'ChatController@getChat')->middleware('auth');

Route::post('/messages_send', 'ChatController@store')->name('messages.store');
Route::get('/markAsRead', function(){
	auth()->user()->unreadNotifications->markAsRead();
})->middleware('auth');