<?php



class Hotel extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'hotels';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable = array('name','address','tel');

	    public function users()
    {
        return $this->belongsToMany('User','hotel_user');
    }
      public function rooms() {
        return $this->belongsToMany('Room','room_hotel');
    }

}
