    <?php

    class StaffController extends BaseController {

    	public function showStaff()
    	{
            //member can't see staff
            if(!Authority::getCurrentUser()->hasRole('member') )
            {
    		  return View::make('staff.staff')
    		  ->with ('hotels',hotel::all())
    		  ->with ('users',user::all());
            }
            //Something went wrong
            else
                return Redirect::back()->with('success', 'Access deny ');
    	}


    	public function showRequest()
    	{
            //only manager can see request to accept memeber to staff
            if(Authority::getCurrentUser()->hasRole('manager') )
                return View::make('request.request');
            //Something went wrong
            else
                return Redirect::back()->with('success', 'Access deny ');
    	}

    	public function staffAccept($hotel_id,$member_id)
    	{
		    //only manager can accept member to staff
            if( Authority::getCurrentUser()->hasRole('manager') )
            {
    		  $member = User::find($member_id);
            //remove request this member all hotel
    		foreach( $member->requestHotels as $hotels){
    			$member->requestHotels()->detach($hotels->id);
    		}
            //add member to staff in this hotel
    		$member->hotels()->attach($hotel_id);
            //change roll manager to staff
    		$member->roles()->detach(2);
    		$member->roles()->attach(4);
            //create permission for staff
    		$permission = new Permission;
    		$permission->user_id = $member_id;
            //intial default permission
    		$permission->view_room = 0;
    		$permission->manage_room = 0;
    		$permission->view_guest = 0;
    		$permission->manage_guest = 0; 
    		$permission->save();

    		return Redirect::to('permission/'.$hotel_id.'/'.$member_id)->with('Set Permission', 'You set permission :'.$member->name);
            }
            //Something went wrong
            else
                return Redirect::back()->with('success', 'Access deny ');
    	}

    	public function staffDecline($hotel_id,$member_id)
    	{  
            //only manager can delice member to staff
            if( Authority::getCurrentUser()->hasRole('manager') )
            {
    	        $member = User::find($member_id);
    		    $hotel = Hotel::find($hotel_id);
                //remove request from this hotel
    		    $member->requestHotels()->detach($hotel_id);
            
    		return Redirect::to('staff')->with('success', 'You have successfully decline '.$member->name.' from '.$hotel->name);
            }
            //Something went wrong
            else
                return Redirect::back()->with('success', 'Access deny ');
            
    	}

    	public function fireStaff($hotel_id,$member_id)
    	{
            //only manager can fire staff
            if( Authority::getCurrentUser()->hasRole('manager') )
            {
            $hotel = Hotel::find($hotel_id);
    		$member = User::find($member_id);
            $member->permissions->delete();
    		$member->hotels()->detach($hotel_id);
    		$member->roles()->detach(4);
    		$member->roles()->attach(2);

            return Redirect::to('staff')->with('success', 'You fire : '.$member->name.' from '.$hotel->name );
            }
            //Something went wrong
            else
            return Redirect::back()->with('success', 'Access deny ');
    	}
    }
