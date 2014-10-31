<?php
class Statusroom extends Eloquent {
// public  $timestamps = false;
    public function rooms()
    {
        return $this->belongsToMany('Room','status_room');
    }

}
?>