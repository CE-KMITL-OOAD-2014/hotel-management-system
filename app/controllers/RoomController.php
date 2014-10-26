<?php

class RoomController extends BaseController {

	public function showRoom()
	{
		return View::make('room.myroom')
         ->with ('rooms',hotel::all());
	}
	public function showCreateRoom()
	{
		return View::make('room.create_myroom');

	}

	   public function postCreateRoom()
        {
                    $userdata = array(
            'no.' => Input::get('no'),
            'price' => Input::get('price'),
            'detail' => Input::get('detail'),
    
        );
                            $rules = array(
            'no.' => 'Required',
            'price' =>  'Required'
            'detail' =>  'Required',
         
        );
        $validator = Validator::make($userdata, $rules);
        if ($validator->passes())
        {
            // Create user in database
            room::create($userdata);


            // Redirect to home with success message
            return Redirect::to('myhotel')->with('success', 'You have successfully create room');
        }
        else
        // Something went wrong.
        return Redirect::to('myhotel')->withErrors($validator)->withInput(Input::except('fail'));
        }

    }

}
