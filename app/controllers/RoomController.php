<?php

class RoomController extends BaseController {

    public function showRoom($id)
    {
        $user=User::find(Auth::id());
        if($user->permissions->view_room==1 || Authority::getCurrentUser()->hasRole('manager') )
        return View::make('room.room',array('rooms'=>room::all(),'hotel'=>hotel::all(),'hotel_id'=>$id));
        else
        return Redirect::to('hotel/')->with('success', 'Access Denied');
    }
    public function showCreateRoom($id)
    {   
        $user=User::find(Auth::id());
        if($user->permissions->manage_room==1 || Authority::getCurrentUser()->hasRole('manager') )
        return View::make('room.create_room',array('rooms'=>room::all(),'hotel_id'=>$id));
        else
        return Redirect::to('hotel/')->with('success', 'Access Denied');
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
            $new_room = room::create($userdata);

            //Attach current hotel to newly room 
             $hotel= hotel::find($id);
             $hotel->rooms()->attach($new_room);

            //Set new_room status to empty(1)
             $new_room->statusrooms()->attach(1);
           
            // Redirect to home with success message
            return Redirect::to('myhotel/'.$hotel->id)->with('success', 'You have successfully create room');
        }
        else
        // Something went wrong.
        return Redirect::to('create_room')->withErrors($validator)->withInput(Input::except('fail'));
        }
    public function showEditRoom($id)
    {
        return View::make('room.edit_room')
        ->with('room',room::find($id));   
    }
    public function postEditRoom($id){
        $room = room::find($id);
        $room->roomnumber = Input::get('roomnumber');
        $room->price = Input::get('price');
        $room->detail = Input::get('detail');
        $room->save();
    return Redirect::to('myhotel')->with('success', 'You have successfully edit '.$room->roomnumber.' room.');
    }
}