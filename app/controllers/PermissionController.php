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
            $member = User::find($member_id);
        //set permission staff about room
	 	if(Input::get('room')=='view_room'){
            $member->permissions->view_room = 1;
            $member->permissions->manage_room = 0;
        }
        elseif(Input::get('room')=='manage_room'){
            $member->permissions->view_room = 1;
            $member->permissions->manage_room = 1;  
        }
        else{
            $member->permissions->view_room = 0;
            $member->permissions->manage_room = 0;  
        }
        //set permissions staff about guest
        if(Input::get('guest')=='view_guest'){
            $member->permissions->view_guest = 1;
            $member->permissions->manage_guest = 0;
        }
        elseif(Input::get('guest')=='manage_guest'){
            $member->permissions->view_guest = 1;
            $member->permissions->manage_guest = 1;  
        }
        else{
            $member->permissions->view_guest = 0;
            $member->permissions->manage_guest = 0;  
        }
        $member->permissions->save();

        $user = User::find($member_id);
	return Redirect::to('staff')->with('success', 'You have successfully set '.$user->name.' permission.');
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
        $member = User::find($member_id);
        //set permission room
        if(Input::get('room')=='view_room'){
            $member->permissions->view_room = 1;
            $member->permissions->manage_room = 0;
        }
        elseif(Input::get('room')=='manage_room'){
            $member->permissions->view_room = 1;
            $member->permissions->manage_room = 1;  
        }
        else{
            $member->permissions->view_room = 0;
            $member->permissions->manage_room = 0;  
        }
        // set$member->permissions guest
        if(Input::get('guest')=='view_guest'){
            $member->permissions->view_guest = 1;
            $member->permissions->manage_guest = 0;
        }
        elseif(Input::get('guest')=='manage_guest'){
            $member->permissions->view_guest = 1;
            $member->permissions->manage_guest = 1;  
        }
        else{
            $member->permissions->view_guest = 0;
            $member->permissions->manage_guest = 0;  
        }
        $member->permissions->save();

    return Redirect::to('staff')->with('success', 'You have successfully set '.$member->name.' permission.');
    }
}