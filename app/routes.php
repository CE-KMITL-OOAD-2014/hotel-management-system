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
Route::get('join_hotel/{id}','HotelController@joinHotel');

Route::get('myhotel/{id}','RoomController@showRoom');
Route::get('create_room/{id}','RoomController@showCreateRoom');
Route::post('create_room/{id}','RoomController@postCreateRoom');

Route::get('staff','StaffController@showStaff');
Route::get('request','StaffController@showRequest');
Route::get('accept/{hotel}/{id}','StaffController@staffAccept');
Route::get('decline/{hotel}/{id}','StaffController@staffDecline');

Route::get('guest','guestController@showGuest');
Route::get('create_guest','guestController@showCreateGuest');
Route::post('create_guest','guestController@postCreateGuest');

Route::get('login', 'AuthController@showLogin');
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@getLogout');
Route::get('register','AuthController@showRegister');
Route::post('register', 'AuthController@postRegister');