<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	protected $fillable = array('name','lastname','username', 'password', 'email');

    public function permissions() 
    {
        return $this->hasOne('Permission');
    }

    public function hotels()
    {
        return $this->belongsToMany('Hotel','hotel_user');
    }
    
    public function requestHotels()
    {
        return $this->belongsToMany('Hotel','request_hotel');
    }

}