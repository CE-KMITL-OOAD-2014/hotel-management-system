<?php

class RoomController extends BaseController {

    public function showRoom($id)
    {
        $user=User::find(Auth::id());
        if( Authority::getCurrentUser()->hasRole('manager') )
            return View::make('room.room',array('rooms'=>room::all(),'hotel'=>hotel::all(),'hotel_id'=>$id));
        elseif($user->permissions->view_room==1 )
            return View::make('room.room',array('rooms'=>room::all(),'hotel'=>hotel::all(),'hotel_id'=>$id));
        else
            return Redirect::to('hotel/')->with('success', 'Access Denied');
    }
    public function showCreateRoom($id)
    {   
        $user=User::find(Auth::id());
        if( Authority::getCurrentUser()->hasRole('manager') )
            return View::make('room.create_room',array('rooms'=>room::all(),'hotel_id'=>$id));
        elseif($user->permissions->manage_room==1)
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
            return Redirect::to('hotel/'.$hotel->id)->with('success', 'You have successfully create room');
        }
        else
        // Something went wrong.
            return Redirect::to('create_room')->withErrors($validator)->withInput(Input::except('fail'));
    }
    public function showEditRoom($hotel_id,$id)
    {
        return View::make('room.edit_room')
        ->with('hotel_id',hotel::find($hotel_id))
        ->with('room_id',room::find($id));   
    }

    public function postEditRoom($hotel_id,$room_id)
    {
        $hotel = hotel::find($hotel_id);
        $room = room::find($room_id);    
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
        if ($validator->passes()){
            $room->roomnumber = Input::get('roomnumber');
            $room->price = Input::get('price');
            $room->detail = Input::get('detail');
            $room->save();
            return Redirect::to('hotel/'.$hotel->id)->with('success', 'You have successfully edit '.$room->roomnumber.' room.');
        }
        else
        // Something went wrong.
            return Redirect::to('edit_room/'.$hotel_id.'/'.$room->id)->withErrors($validator)->withInput(Input::except('fail'));
    }
    public function deleteRoom($hotel_id,$room_id){
        $hotel = hotel::find($hotel_id);
        $room = room::find($room_id);  
    }
}