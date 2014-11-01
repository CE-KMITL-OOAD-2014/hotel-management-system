<?php
class Permission extends Eloquent {
	protected $table = 'permissions';
	protected $fillable = array('user_id','view_room','change_status_room','view_guest','create_guest');
	
	    public function users() {
        return $this->belongsTo('User');
    }
}
?>