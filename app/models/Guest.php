<?php



class Guest extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'guests';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable = array('gender','nationality','name','lastname',
		'dateOfBirth','address','tel','passportNo','citizenCardNo','comment');

	public function hotels()
    {
        return $this->belongsToMany('Hotel','guest_hotel');
    }


}
		