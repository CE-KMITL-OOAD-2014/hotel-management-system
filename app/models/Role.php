<?php
class Role extends Eloquent {
// public  $timestamps = false;
    public function users()
    {
        return $this->belongsToMany('User','role_user');
    }

}
?>