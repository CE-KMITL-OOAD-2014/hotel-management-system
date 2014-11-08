<?php



class Room extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'rooms';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable = array('roomnumber','price','detail');

    public function hotels() 
    {
        return $this->belongTo('Hotel','room_hotel');
    }

    public function statuses() 
    {
        return $this->hasMany('Status');
    }

}
	