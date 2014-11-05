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

    public function getRoomJson($hotel_id){
        $hotels=Hotel::find($hotel_id);
        $event=array();
        foreach ($hotels->rooms as $room) {
            if($room->checkin!=NULL&&$room->checkout!=NULL){
                array_push($event,  room::find($room->id,array('roomnumber as title','checkin as start','checkout as end', )));
            }
        }
        return $event;
    }


       /////This function will display form use to change room status
    public function showChangeRoomstatus($hotel_id){
        ////populate drop down menu ($room_choice) with empty room of current hotel
        $hotel = Hotel::find($hotel_id);
        $room_choice =array('' =>'Please select room number');
        foreach ($hotel->rooms as $room) {
            foreach ($room->statusrooms as $status) {
                if($status->name == 'Empty'){
                    array_push($room_choice, $room->roomnumber);
                }
            }
        }
        $status_choice = array('' =>'Please select room status') + Statusroom::where('name','!=','Empty')->lists('name','id');

        return View::make('room.change_room_status',array('hotel_id'=>$hotel_id,'rooms'=>$room_choice,'status'=>$status_choice));
    }

}