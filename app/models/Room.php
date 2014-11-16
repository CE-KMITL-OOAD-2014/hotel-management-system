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
	
	protected $fillable = array('roomnumber','price','detail','hotel_id');

	public function hotels() 
	{
		return $this->belongsTo('Hotel');
	}

	public function statuses() 
	{
		return $this->hasMany('Status');
	}

}
