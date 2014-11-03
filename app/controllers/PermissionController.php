    <?php

class PermissionController extends BaseController {

	public function showSetPermission($hotel_id,$member_id)
	{
		return View::make('permission.permission') 
		->with ('hotel_id',hotel::find($hotel_id))
        ->with ('staff_id',user::find($member_id));
	}

	public function postSetPermission($hotel_id,$member_id)
	 {
	 	$permission = new Permission;
        $permission->user_id = $member_id;
        $permission->view_room = Input::get('view_room');
        $permission->manage_room = Input::get('manage_room');
        $permission->view_guest = Input::get('view_guest');
        $permission->manage_guest = Input::get('manage_guest');
        $permission->save();

        $user = User::find($member_id);
	return Redirect::to('myhotel/'.$hotel_id)->with('success', 'You have successfully set '.$user->name.' permission.');
            // Redirect to home with success message
        //    return Redirect::to('myhotel/'.$hotel->id)->with('success', 'You have successfully set permission');
        
        //else
        // Something went wrong.
        //return Redirect::to('create_room')->withErrors($validator)->withInput(Input::except('fail'));
    }

    public function showEditPermission($hotel_id,$member_id)
    {
        return View::make('permission.edit_permission') 
        ->with ('hotel_id',hotel::find($hotel_id))
        ->with ('staff_id',user::find($member_id));
    }

        public function postEditPermission($hotel_id,$member_id)
    {
        $user =User::find($member_id);
        $user->permissions->view_room = Input::get('view_room');
        $user->permissions->manage_room = Input::get('manage_room');
        $user->permissions->view_guest = Input::get('view_guest');
        $user->permissions->manage_guest = Input::get('manage_guest');
        $user->permissions->save();
    return Redirect::to('staff')->with('success', 'You have successfully set '.$user->name.' permission.');
    }
}