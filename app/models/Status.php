<?php



class Status extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'statuses';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable = array('status','room_id','start','end');

	public function rooms() 
	{
		return $this->belongsTo('Room');
	}

}
