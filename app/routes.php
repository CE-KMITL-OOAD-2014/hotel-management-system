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

Route::get('hotel','HotelController@showHotel');
Route::get('create_hotel','HotelController@showCreateHotel');
Route::post('create_hotel','HotelController@postCreateHotel');
Route::get('edit_hotel/{id}','HotelController@showEditHotel');
Route::post('edit_hotel/{id}','HotelController@postEditHotel');
Route::get('join_hotel/{id}','HotelController@joinHotel');
Route::get('delete_hotel/{id}','HotelController@deleteHotel');

Route::get('room','RoomController@showRoom');
Route::get('hotel/{id}','RoomController@showroomCalendar');
Route::get('create_room/{id}','RoomController@showCreateRoom');
Route::post('create_room/{id}','RoomController@postCreateRoom');
Route::get('edit_room/{hotel}/{room}','RoomController@showEditRoom');
Route::post('edit_room/{hotel}/{room}','RoomController@postEditRoom');
Route::get('delete_room/{hotel}/{room}','RoomController@deleteRoom');
Route::get('change_room_status/{hotel_id}','RoomController@showCreateRoomstatus');
Route::post('change_room_status/{hotel_id}','RoomController@postCreateRoomstatus');
Route::get('hotel/delete_room_status/{status_id}','RoomController@getDeleteRoomstatus');

Route::get('staff','StaffController@showStaff');
Route::get('request','StaffController@showRequest');
Route::get('accept/{hotel}/{id}','StaffController@staffAccept');
Route::get('decline/{hotel}/{id}','StaffController@staffDecline');
Route::get('fireStaff/{hotel}/{id}','StaffController@fireStaff');

Route::get('guest','GuestController@showGuest');
Route::get('create_guest/{id}','GuestController@showCreateGuest');
Route::post('create_guest/{id}','GuestController@postCreateGuest');
Route::get('edit_guest/{hotel}/{guest}','GuestController@showEditGuest');
Route::post('edit_guest/{hotel}/{guest}','GuestController@postEditGuest');
Route::get('delete_guest/{hotel}/{guest}','GuestController@deleteGuest');

Route::get('permission/{hotel}/{id}','PermissionController@showSetPermission');
Route::post('permission/{hotel}/{id}','PermissionController@postSetPermission');
Route::get('edit_permission/{hotel}/{id}','PermissionController@showEditPermission');
Route::post('edit_permission/{hotel}/{id}','PermissionController@postEditPermission');

Route::get('login', 'AuthController@showLogin');
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@getLogout');
Route::get('register','AuthController@showRegister');
Route::post('register', 'AuthController@postRegister');
Route::get('edit_user','AuthController@showEditUser');
Route::post('edit_user','AuthController@postEditUser');

Route::group(array('prefix' => 'api'), function()
{
	Route::resource('hotel','HotelController');
    Route::any('room/{room_status}/{hotel_id}','RoomController@getRoomJson');

});