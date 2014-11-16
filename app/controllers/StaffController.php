    <?php

    class StaffController extends BaseController {

    	public function showStaff()
    	{
            //member can't see staff
            if(Auth::user()->role != 'member' )
            {
                return View::make('staff.staff')
                ->with ('hotels',hotel::all())
                ->with ('users',user::all());
            }
            //Something went wrong
            else return Redirect::to('')->with('fail', 'Access deny ');
        }


        public function showRequest()
        {
            //only manager can see request to accept memeber to staff
            if(Auth::user()->role == 'manager')
                return View::make('request.request');
            //Something went wrong
            else return Redirect::to('')->with('fail', 'Access deny ');
        }

        public function staffAccept($hotel_id,$member_id)
        {
		    //only manager can accept member to staff
            if(Auth::user()->role == 'manager' )
            {
                $member = User::find($member_id);
            //remove request this member all hotel
                foreach( $member->requestHotels as $hotels){
                 $member->requestHotels()->detach($hotels->id);
             }
            //add member to staff in this hotel
             $member->hotels()->attach($hotel_id);
            //change roll manager to staff
             $member->role = 'staff';
             $member->save();
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
         else return Redirect::to('')->with('fail', 'Access deny ');
     }

     public function staffDecline($hotel_id,$member_id)
     {  
            //only manager can delice member to staff
        if(Auth::user()->role == 'manager' )
        {
           $member = User::find($member_id);
           $hotel = Hotel::find($hotel_id);
                //remove request from this hotel
           $member->requestHotels()->detach($hotel_id);
           
           return Redirect::to('staff')->with('success', 'You have successfully decline '.$member->name.' from '.$hotel->name);
       }
            //Something went wrong
       else return Redirect::to('')->with('fail', 'Access deny ');
       
   }

   public function fireStaff($hotel_id,$member_id)
   {
            //only manager can fire staff
    if(Auth::user()->role == 'manager' )
    {
        $hotel = Hotel::find($hotel_id);
        $member = User::find($member_id);
        $member->permissions->delete();
        $member->hotels()->detach($hotel_id);
        $member->role = 'member';
        $member->save();

        return Redirect::to('staff')->with('success', 'You fire : '.$member->name.' from '.$hotel->name );
    }
            //Something went wrong
    else return Redirect::to('')->with('fail', 'Access deny ');
}
}
