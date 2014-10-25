<?php

class HotelController extends BaseController {

	public function showHotel()
	{
		return View::make('hotel.myhotel');
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
            // Create user in database
            hotel::create($userdata);

            // set defualt role to member
            $user = User::find(Auth::id());
            $user->roles()->detach(2);
            $user->roles()->attach(3);

            // Redirect to home with success message
            return Redirect::to('myhotel')->with('success', 'You have successfully create hotel');
        }
        else
        // Something went wrong.
        return Redirect::to('myhotel')->withErrors($validator)->withInput(Input::except('password'));
        }

}
