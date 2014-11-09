    <?php


    class PermissionController extends BaseController {

       public function showSetPermission($hotel_id,$staff_id)
       {
        //check manager can set permission staff
        if( User::find(Auth::id())->role == 'manager' )
        {
            return View::make('permission.permission') 
            ->with ('hotel_id',hotel::find($hotel_id))
            ->with ('staff_id',user::find($staff_id));
        }
       //Something went wrong
        else
            return Redirect::to('hotel/')->with('fail', 'access denied');
    }

    public function postSetPermission($hotel_id,$staff_id)
    {
        $staff = User::find($staff_id);
        //set permission staff about room
        //can view room
        if(Input::get('room')=='view_room')
        {
            $staff->permissions->view_room = 1;
            $staff->permissions->manage_room = 0;
        }
        //can view and setStatus room
        elseif(Input::get('room')=='manage_room')
        {
            $staff->permissions->view_room = 1;
            $staff->permissions->manage_room = 1;  
        }
        //not permission about room
        else
        {
            $staff->permissions->view_room = 0;
            $staff->permissions->manage_room = 0;  
        }
        //set permissions staff about guest
        //can view guest
        if(Input::get('guest')=='view_guest')
        {
            $staff->permissions->view_guest = 1;
            $staff->permissions->manage_guest = 0;
        }
        //can view and create guest
        elseif(Input::get('guest')=='manage_guest')
        {
            $staff->permissions->view_guest = 1;
            $staff->permissions->manage_guest = 1;  
        }
        //not permission about guest
        else
        {
            $staff->permissions->view_guest = 0;
            $staff->permissions->manage_guest = 0;  
        }
        //replace old data with input
        $staff->permissions->save();
        return Redirect::to('staff')->with('success', 'You have successfully set '.$staff->name.' permission.');
    }

    public function showEditPermission($hotel_id,$staff_id)
    {
        if( User::find(Auth::id())->role == 'manager' )
        {
            return View::make('permission.edit_permission') 
            ->with ('hotel_id',hotel::find($hotel_id))
            ->with ('staff_id',user::find($staff_id));
        }
        else  return Redirect::back()->with('fail', 'Access deny ');
    }

    public function postEditPermission($hotel_id,$staff_id)
    {
        $staff = User::find($staff_id);
        //edit permission staff about room
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
        //not permission about room
        else{
            $staff->permissions->view_room = 0;
            $staff->permissions->manage_room = 0;  
        }
     
        //edit permissions staff about guest
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
        //not permission about guest
        else{
            $staff->permissions->view_guest = 0;
            $staff->permissions->manage_guest = 0;  
        }
        $staff->work_history = Input::get('work_history');
         //replace old data with input
        $staff->permissions->save();
        $staff->save();
        return Redirect::to('staff')->with('success', 'You have successfully set '.$staff->name.' permission.');
    }
}