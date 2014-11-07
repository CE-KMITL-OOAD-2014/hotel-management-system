    <?php


    class PermissionController extends BaseController {

       public function showSetPermission($hotel_id,$staff_id)
       {
        //check manager can set permission staff
        if( Authority::getCurrentUser()->hasRole('manager') ){
            return View::make('permission.permission') 
            ->with ('hotel_id',hotel::find($hotel_id))
            ->with ('staff_id',user::find($staff_id));
        }
       //Something went wrong
        else
            return Redirect::to('hotel/')->with('success', 'access denied');
    }

    public function postSetPermission($hotel_id,$staff_id)
    {
        $staff = User::find($staff_id);
        //set permission staff about room
        //can view room
        if(Input::get('room')=='view_room'){
            $staff->permissions->view_room = 1;
            $staff->permissions->manage_room = 0;
        }
        //can view and setStatus room
        elseif(Input::get('room')=='manage_room'){
            $staff->permissions->view_room = 1;
            $staff->permissions->manage_room = 1;  
        }
        else{
            $staff->permissions->view_room = 0;
            $staff->permissions->manage_room = 0;  
        }
        //set permissions staff about guest
        //can view guest
        if(Input::get('guest')=='view_guest'){
            $staff->permissions->view_guest = 1;
            $staff->permissions->manage_guest = 0;
        }
        //can view and create guest
        elseif(Input::get('guest')=='manage_guest'){
            $staff->permissions->view_guest = 1;
            $staff->permissions->manage_guest = 1;  
        }
        else{
            $staff->permissions->view_guest = 0;
            $staff->permissions->manage_guest = 0;  
        }
        $staff->permissions->save();

        return Redirect::to('staff')->with('success', 'You have successfully set '.$staff->name.' permission.');
    }

    public function showEditPermission($hotel_id,$member_id)
    {
    if( Authority::getCurrentUser()->hasRole('manager') ){
        return View::make('permission.edit_permission') 
        ->with ('hotel_id',hotel::find($hotel_id))
        ->with ('staff_id',user::find($member_id));
    }
    else  return Redirect::back()->with('success', 'Access deny ');
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