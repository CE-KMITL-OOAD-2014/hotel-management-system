<?php

class RoomController extends BaseController {

	public function showRoom()
	{
		return View::make('room.room')
         ->with ('rooms',room::all());
	}
	public function showCreateRoom()
	{
		return View::make('room.create_room');

	}

	   public function postCreateRoom()
        {
                    $userdata = array(
            'roomnumber' => Input::get('roomnumber'),
            'price' => Input::get('price'),
            'detail' => Input::get('detail'),
    
        );
                            $rules = array(
            'roomnumber' => 'Required',
            'price' =>  'Required',
            'detail' =>  'Required',
         
        );
        $validator = Validator::make($userdata, $rules);
        if ($validator->passes())
        {
            // Create user in database
            room::create($userdata);

            //Attach current hotel to newly room 
            $user = Hotel::find(Auth::id());
            $hotel = DB::table('rooms')->max('id');
            $user->rooms()->attach($room);


            // Redirect to home with success message
            return Redirect::to('room')->with('success', 'You have successfully create room');
        }
        else
        // Something went wrong.
        return Redirect::to('create_room')->withErrors($validator)->withInput(Input::except('fail'));
        }

    }