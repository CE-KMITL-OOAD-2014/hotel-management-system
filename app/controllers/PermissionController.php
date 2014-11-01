    <?php

class PermissionController extends BaseController {

	public function setPermission($hotel_id,$member_id)
	{
		return View::make('permission.permission');
		$member = User::find($member_id);
		$hotel = Hotel::find($hotel_id);
		$permission = new Permission;
        $permission->user_id = $member_id;
        $permission->view_room = 1;
        $permission->change_status_room = 1;
        $permission->view_guest = 1;
        $permission->create_guest = 1;
        $permission->save();
  //return Redirect::to('myhotel/'.$hotel_id)->with('success', 'You have successfully accept '.$member->name.' as staff.');      
	}





	

}
