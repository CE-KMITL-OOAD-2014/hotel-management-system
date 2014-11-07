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

    public function rooms() 
    {
        return $this->belongsToMany('Room','room_hotel');
    }

    public function requestUsers()
    {
        return $this->belongsToMany('User','request_hotel');
    }
    
    public function guests()
    {
    	return $this->belongsToMany('Guest','guest_hotel');
   	}

}
