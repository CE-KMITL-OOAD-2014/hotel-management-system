    <?php

class HotelController extends BaseController {

	public function showHotel()
	{

		return View::make('hotel.hotel')
         ->with ('hotels',hotel::all());
	}


	public function showCreateHotel()
	{
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

            // Redirect to home with success message
            return Redirect::to('hotel')->with('success', 'You have successfully create hotel');
        }
        else
        // Something went wrong.
        return Redirect::to('create_hotel')->withErrors($validator)->withInput(Input::except('password'));
        }


       public function joinHotel($id)
    {
        if(Authority::can('join','hotel')){
            $user = User::find(Auth::id());
            $hotel = hotel::find($id); 
            foreach( $user->requestHotels as $hotels){
                foreach($hotel->requestUsers as $users){
                    if($hotels->id==$id&&$users->id==$user->id)
                        return Redirect::to('hotel')->with('success', 'You have successfully request to join hotel');
                }
            }
            $user->requestHotels()->attach($hotel);
            return Redirect::to('hotel')->with('success', 'You have successfully request to join hotel');
        }
    }
        public function showEditHotel($id){
        return View::make('hotel.edit_hotel')
        ->with('hotel',hotel::find($id));
    }
    public function postEditHotel($id){
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
        if ($validator->passes()){
            $hotel->address = Input::get('address');
            $hotel->tel = Input::get('tel');
            $hotel->save();
            return Redirect::to('hotel')->with('success', 'You have successfully edit '.$hotel->name.' hotel.');
        }
        else 
            return Redirect::to('edit_hotel/'.$hotel->id)->withErrors($validator)->withInput(Input::except('password'));
    }
}
