<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

Route::get('about', 'AboutController@showAbout');

Route::get('myhotel','HotelController@showHotel');
Route::get('create_hotel','HotelController@showCreateHotel');
Route::post('create_hotel','HotelController@postCreateHotel');

Route::get('myhotel/{id}','RoomController@showRoom');
Route::get('create_room','RoomController@showCreateRoom');
Route::post('create_room','RoomController@postCreateRoom');

Route::get('login', 'AuthController@showLogin');
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@getLogout');
Route::get('register','AuthController@showRegister');
Route::post('register', 'AuthController@postRegister');