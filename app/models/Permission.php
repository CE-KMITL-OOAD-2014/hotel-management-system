<?php
class Permission extends Eloquent {
	protected $table = 'permissions';
	protected $fillable = array('user_id','view_room','manage_room','view_guest','manage_guest');
	
	    public function users() {
        return $this->belongsTo('User');
    }
}
?>