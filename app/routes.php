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
<<<<<<< HEAD
Route::post('create_hotel','HotelController@postCreateHotel');
// Authentication
=======

// Authentication & registration
>>>>>>> origin/master
Route::get('login', 'AuthController@showLogin');
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@getLogout');
Route::get('register','AuthController@showRegister');
Route::post('register', 'AuthController@postRegister');