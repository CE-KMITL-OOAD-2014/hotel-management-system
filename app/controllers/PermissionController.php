    <?php

class PermissionController extends BaseController {

	public function showSetPermission($hotel_id,$member_id)
	{
		return View::make('permission.permission') 
		->with ('hotel_id',hotel::find($hotel_id))
        ->with ('staff_id',user::find($member_id));
		$member = User::find($member_id);
		$hotel = Hotel::find($hotel_id);
		
        
	}
	public function postSetPermission($hotel_id,$member_id)
	 {
	 	$permission = new Permission;
        $permission->user_id = $member_id;
        $permission->view_room = Input::get('view_room');
        $permission->change_status_room = Input::get('change_status_room');;
        $permission->view_guest = Input::get('view_guest');;
        $permission->create_guest = Input::get('create_guest');;
        $permission->save();

        $user = User::find($member_id);
	return Redirect::to('myhotel/'.$hotel_id)->with('success', 'You have successfully set '.$user->name.' permission.');
            // Redirect to home with success message
        //    return Redirect::to('myhotel/'.$hotel->id)->with('success', 'You have successfully set permission');
        
        //else
        // Something went wrong.
        //return Redirect::to('create_room')->withErrors($validator)->withInput(Input::except('fail'));
        

    }
}