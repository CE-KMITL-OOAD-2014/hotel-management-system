    <?php

    class HotelController extends BaseController {

       public function showHotel()
       {

          return View::make('hotel.hotel')
          ->with ('hotels',hotel::all());
      }


      public function showCreateHotel()
      {
        //staff can't create hotel
        if(!Authority::getCurrentUser()->hasRole('staff') )
            return View::make('hotel.create_hotel');
      }

      public function postCreateHotel()
      {
        $userdata = array(
            'name' => Input::get('name'),
            'address' => Input::get('address'),
            'tel' => Input::get('tel'),

            );
        $rules = array(
            'name' => 'Required',
            'address' =>  'Required|unique:hotels',
            'tel' =>  'Required|unique:hotels',

            );
        $validator = Validator::make($userdata, $rules);
        if ($validator->passes())
        {
            // Create hotel in database
            $new_hotel =  hotel::create($userdata);

            //Change role member to manager
            if(Authority::getCurrentUser()->hasRole('member')){
                $user = User::find(Auth::id());
                $user->roles()->detach(2);
                $user->roles()->attach(3);
            }

            //Attatch current user to newly created hotel
            $user = User::find(Auth::id());
            $user->hotels()->attach($new_hotel);

            //Remove request this user all hotel
            foreach( $user->requestHotels as $hotels){
                $user->requestHotels()->detach($hotels->id);
            }
            //Redirect to home with success message
            return Redirect::to('hotel')->with('success', 'You have successfully create hotel');
        }
        else
        // Something went wrong.
            return Redirect::back()->withErrors($validator)->withInput();
    }


    public function joinHotel($id)
    {
        //check only member can join hotel
        if(Authority::can('join','hotel')){
            $user = User::find(Auth::id());
            $hotel = hotel::find($id); 
            //check this user have duplicate join : not create request
            foreach( $user->requestHotels as $hotels){
                foreach($hotel->requestUsers as $users){
                    if($hotels->id==$id&&$users->id==$user->id)
                        return Redirect::to('hotel')->with('success', 'You have successfully request to join hotel');
                }
            }
            //create request to hotel
            $user->requestHotels()->attach($hotel);
            return Redirect::to('hotel')->with('success', 'You have successfully request to join hotel');
        }
    }

    public function showEditHotel($id)
    {
        //check only manager can edit hotel
        if(Authority::getCurrentUser()->hasRole('manager') ){
            return View::make('hotel.edit_hotel')   
            ->with('hotel',hotel::find($id));
        }
    }
    public function postEditHotel($id)
    {
        $hotel = hotel::find($id);
        $hotel->name = Input::get('name');

        $userdata = array(
            'name' => Input::get('name'),
            'address' => Input::get('address'),
            'tel' => Input::get('tel'),
            );
        $rules = array(
            'name' => 'Required',
            'address' =>  'Required|unique:hotels,address,'.$id,
            'tel' =>  'Required|unique:hotels,tel,'.$id,

            );
        $validator = Validator::make($userdata, $rules);
        if ($validator->passes())
        {
            //replace old data with input
            $hotel->address = Input::get('address');
            $hotel->tel = Input::get('tel');
            $hotel->save();
            return Redirect::to('hotel')->with('success', 'You have successfully edit '.$hotel->name.' hotel.');
        }
        //Something went wrong
        else 
            return Redirect::back()->withErrors($validator)->withInput();
    }
    public function deleteHotel($id){

        $user=User::find(Auth::id());
        $hotel=Hotel::find($id);
        if(Authority::getCurrentUser()->hasRole('manager') )
        {
            //delete all guest in hotel
            foreach($hotel->guests as $guest){
                App::make('GuestController')->deleteGuest($id,$guest->id);
            }
            //delete all request user in hotel
            foreach($hotel->requestUsers as $request){
                App::make('StaffController')->staffDecline($id,$request->id);
            }
            //delete all room in hotel
            foreach($hotel->rooms as $room){
                App::make('RoomController')->deleteRoom($id,$room->id);
            }
            //delete all staff in hotel
            foreach($hotel->users as $staff){
                foreach($staff->roles as $roles_staff){
                    if($roles_staff->name == 'staff' )
                        App::make('StaffController')->fireStaff($id,$staff->id);
                }
            }
            //delete hotel
            $hotel->delete();
            // check other hotel of manager to change roll
            $countHotel = 0;

            foreach($user->hotels as $hotel ){
               $countHotel++;
            }
            //no hotel change roll to member
            if($countHotel==0){
                $user->roles()->detach(3);
                $user->roles()->attach(2);
            }
        return Redirect::to('hotel')->with('success', 'You have successfully edit '.$hotel->name.' hotel.');
     }
     //Something went wrong
     else
        return Redirect::back()->with('success', 'access deny' );
    }
}
