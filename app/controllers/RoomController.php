<?php

class RoomController extends BaseController {

    public function showRoom($id)
    {
        return View::make('room.room',array('rooms'=>room::all(),'hotel'=>hotel::all(),'hotel_id'=>$id));
         
    }
    public function showCreateRoom($id)
    {
        return View::make('room.create_room',array('rooms'=>room::all(),'hotel_id'=>$id));

    }

       public function postCreateRoom($id)
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
             $hotel= hotel::find($id);
             $room = DB::table('rooms')->max('id');
             $hotel->rooms()->attach($room);


            // Redirect to home with success message
            return Redirect::to('myhotel/'.$hotel->id)->with('success', 'You have successfully create room');
        }
        else
        // Something went wrong.
        return Redirect::to('create_room')->withErrors($validator)->withInput(Input::except('fail'));
        }

    }