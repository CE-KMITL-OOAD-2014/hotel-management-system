    <?php

class HotelController extends BaseController {

	public function showHotel()
	{

		return View::make('hotel.myhotel')
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
            hotel::create($userdata);

            //Change role member to manager
            if(Authority::getCurrentUser()->hasRole('member')){
            $user = User::find(Auth::id());
            $user->roles()->detach(2);
            $user->roles()->attach(3);
        }
        
            //Attatch current user to newly created hotel
            $user = User::find(Auth::id());
            $hotel = DB::table('hotels')->max('id');
            $user->hotels()->attach($hotel);

        


            // Redirect to home with success message
            return Redirect::to('myhotel')->with('success', 'You have successfully create hotel');
        }
        else
        // Something went wrong.
        return Redirect::to('create_hotel')->withErrors($validator)->withInput(Input::except('password'));
        }


       public function joinHotel($id)
    {
        if(Authority::getCurrentUser()->hasRole('member')){
        $user = User::find(Auth::id());
        $hotel = hotel::find($id);
        $user->hotels()->attach($hotel);
        $user->roles()->detach(2);
        $user->roles()->attach(4);
        return Redirect::to('myhotel/'.$id)->with('success', 'You have successfully join hotel');
    }
    }

}
