    <?php

    class StaffController extends BaseController {

    	public function showStaff()
    	{

    		return View::make('staff.staff')
    		->with ('hotels',hotel::all())
    		->with ('users',user::all());


    	}


    	public function showRequest()
    	{
    		return View::make('request.request');

    	}

    	public function staffAccept($hotel_id,$member_id)
    	{
		//This work
    		$member = User::find($member_id);
    		foreach( $member->requestHotels as $hotels){
    			$member->requestHotels()->detach($hotels->id);
    		}
    		$member->hotels()->attach($hotel_id);
    		$member->roles()->detach(2);
    		$member->roles()->attach(4);
    		$permission = new Permission;
    		$permission->user_id = $member_id;
    		$permission->view_room = 0;
    		$permission->manage_room = 0;
    		$permission->view_guest = 0;
    		$permission->manage_guest = 0; 
    		$permission->save();
    		return Redirect::to('permission/'.$hotel_id.'/'.$member_id)->with('Set Permission', 'You set permission :'.$member->name.'.');
    	}

    	public function staffDecline($hotel_id,$member_id)
    	{
    		$member = User::find($member_id);
    		$hotel = Hotel::find($hotel_id);
    		$member->requestHotels()->detach($hotel_id);
    		return Redirect::to('myhotel/'.$hotel_id)->with('success', 'You have successfully decline '.$member->name.' as staff.');
    	}

    	public function fireStaff($hotel_id,$member_id)
    	{
            $hotel = Hotel::find($hotel_id);
    		$member = User::find($member_id);
            $member->permissions->delete();
    		$member->hotels()->detach($hotel_id);
    		$member->roles()->detach(4);
    		$member->roles()->attach(2);
            return Redirect::to('staff')->with('success', 'You fire : '.$member->name.' from '.$hotel->name );
    	}

    }
