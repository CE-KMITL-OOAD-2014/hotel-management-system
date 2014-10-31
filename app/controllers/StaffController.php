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
		$hotel = Hotel::find($hotel_id);
		$member->requestHotels()->detach($hotel_id);
		$member->hotels()->attach($hotel);
        $member->roles()->detach(2);
        $member->roles()->attach(4);

        $permission = new Permission;
        $permission->user_id = $member_id;
        $permission->view_room = 1;
        $permission->change_status_room = 1;
        $permission->view_guest = 1;
        $permission->create_guest = 1;
        $permission->save();
        return Redirect::to('myhotel/'.$hotel_id)->with('success', 'You have successfully accept '.$member->name.' as staff.');
	}
	public function staffDecline($hotel_id,$member_id)
	{
		$member = User::find($member_id);
		$hotel = Hotel::find($hotel_id);
		$member->requestHotels()->detach($hotel_id);
        return Redirect::to('myhotel/'.$hotel_id)->with('success', 'You have successfully decline '.$member->name.' as staff.');
	}
	

}
