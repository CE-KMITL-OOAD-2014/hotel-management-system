<?php

class RoomController extends BaseController {

	public function showRoom()
	{
		//only manager can create room
		if(User::find(Auth::id())->role == 'manager' )
		{	
			return View::make('room.room')
			->with('rooms',room::all())
			->with('hotels',hotel::all());
		}
		else if(User::find(Auth::id())->permissions->view_room==1)
			return View::make('room.room')
			->with('rooms',room::all())
			->with('hotels',hotel::all());
		//Something went wrong
		else
			return Redirect::back()->with('success', 'Access Denied');
	}

	public function showRoomCalendar($hotel_id)
	{
		//Check manager or permission staff can view room calendar
		if( User::find(Auth::id())->role == 'manager')
		{
			return View::make('room.room_calendar')
			->with('rooms',room::all())
			->with('hotel_id',$hotel_id);
		}

		elseif(User::find(Auth::id())->permissions->view_room==1 )
		{
			return View::make('room.room_calendar')
			->with('rooms',room::all())
			->with('hotel_id',$hotel_id);
		}
		//Something went wrong
		else
			return Redirect::back()->with('success', 'Access Denied');
	}

	public function showCreateRoom($hotel_id)
	{          
		//Check manager or permission staff can create room
		if( User::find(Auth::id())->role == 'manager' )
		{
			return View::make('room.create_room')
			->with('hotel_id',$hotel_id);
		}
		//Something went wrong
		else
			return Redirect::back()->with('success', 'Access Denied');
	}

	public function postCreateRoom($hotel_id)
	{
		$userdata = array(
			'roomnumber' => Input::get('roomnumber'),
			'price' => Input::get('price'),
			'detail' => Input::get('detail'),

			);
		$rules = array(
			'roomnumber' => 'Required',
			'price' =>  'Required|numeric',
			'detail' =>  'Required',
			);

		$validator = Validator::make($userdata, $rules);
		if ($validator->passes())
		{
            // Create user in database
			$new_room = room::create($userdata);

            //Attach current hotel to newly room 
			$hotel= hotel::find($hotel_id);
			$hotel->rooms()->attach($new_room);

            //Set new_room status to Empty
			$new_status = status::create(array(
				'status'=>'Empty',
				'room_id'=>$new_room->id,));

            // Redirect to home with success message
			return Redirect::to('room')->with('success', 'You have successfully create room '.$new_room->roomnumber);
		}
		else
        // Something went wrong.
			return Redirect::back()->withErrors($validator)->withInput();
	}

	public function showEditRoom($hotel_id,$room_id)
	{	
		//only manager can cedit room.
		if( User::find(Auth::id())->role == 'manager')
		{
			return View::make('room.edit_room')
			->with('hotel_id',hotel::find($hotel_id))
			->with('room_id',room::find($room_id));   
		}
		//Something went wrong.
		else
			return Redirect::back()->with('success', 'Access Denied');
	}

	public function postEditRoom($hotel_id,$room_id)
	{
		$userdata = array(
			'roomnumber' => Input::get('roomnumber'),
			'price' => Input::get('price'),
			'detail' => Input::get('detail'),
			);
		$rules = array(
			'roomnumber' => 'Required',
			'price' =>  'Required|numeric',
			'detail' =>  'Required', 
			);
		$validator = Validator::make($userdata, $rules);
		if ($validator->passes())
		{
			//replace data with input
			$room = room::find($room_id);
			$room->roomnumber = Input::get('roomnumber');
			$room->price = Input::get('price');
			$room->detail = Input::get('detail');
			$room->save();

			return Redirect::to('room')->with('success', 'You have successfully edit '.$room->roomnumber.' room.');
		}
		// Something went wrong.
		else
			return Redirect::back()->withErrors($validator)->withInput(Input::except('fail'));
	}
	public function deleteRoom($hotel_id,$room_id)
	{
		if( User::find(Auth::id())->role == 'manager' )
		{
			$hotel = hotel::find($hotel_id);
			$room = room::find($room_id);  
			//delete relation room and hotel
			$hotel->rooms()->detach($room);
			//delete status room
			$room->statusrooms()->detach([1,2,3,4]);
			//delete room
			$room->delete();

			return Redirect::to('room')->with('success', 'You have successfully delete '.$room->roomnumber.' room.');
		}
		// Something went wrong.
		else return Redirect::back()->with('success', 'Access deny ');
	}

	///return json list of room with specific status & hotel
	public function getRoomJson($room_status,$hotel_id){
		$hotels=Hotel::find($hotel_id);
		$event=array();
		foreach ($hotels->rooms as $room) {
			foreach($room->statuses as $status)
				if($status->status == $room_status){
					$json_array = array(
						'title'=>Room::find($status->room_id)->roomnumber,
						'start'=>$status->start,
						'end'=>$status->end,
						'url'=> ('delete_room_status/'.$status->id )
						);
					array_push($event, $json_array);
				}
			}
			return $event;
		}

		   /////This function will display form to change room status
				public function showCreateRoomstatus($hotel_id){
		////populate drop down menu ($room_choice) with empty room of current hotel
					$hotel = Hotel::find($hotel_id);
					$room_choice =array('' => 'Please select room number');
					foreach ($hotel->rooms as $room) {
						foreach ($room->statuses as $status) {
							if($status->status == 'Empty'){
								$room_choice[$room->id] = $room->roomnumber;
							}
						}
					}
					$status_choice = array('' =>'Please select room status','Occupied'=>'Occupied','Reserved'=>'Reserved','Maintenance'=>'Maintenance');
					return View::make('room.change_room_status',array('hotel_id'=>$hotel_id,'rooms'=>$room_choice,'status'=>$status_choice));
				}

	/////This function will change room status from empty to Occupied, Reserved or Maintenance according to form
public function postCreateRoomstatus($hotel_id){
		$room_data = array(
			'roomnumber' => Input::get('roomnumber'),
			'status' => Input::get('status'),
			'start_date' => Input::get('start_date'),
			'end_date' => Input::get('end_date')
			);

Validator::extend('date_not_overlap', function($attribute, $value, $parameters)
{
	///$parameters[0] = table_name 
	///$parameters[1] = column id ('room_id' in this case )
	///$parameters[2] = value of column id
	///$parameters[3] = value of start
	///$parameters[4] = value of end
	$model = $parameters[0]::all();
	foreach($model as $date){
		if($date->$parameters[1] == $parameters[2]){
			if($date->start<$parameters[4]&&$parameters[3]<$date->end){
				return false;
			}
		}
	}
  return true;
});

		$rules = array(
			'roomnumber' => 'Required',
			'status' => 'Required',
///can't set start date in the past
			'start_date' => 'Required|
			after:'.date('o-m-d',strtotime("-1 days")).'|
			date_not_overlap:status,room_id,'.$room_data['roomnumber'].','.$room_data['start_date'].','.$room_data['end_date'],
///End date must come after start_date
			'end_date' => 'Required|
			after:start_date|
			date_not_overlap:status,room_id,'.$room_data['roomnumber'].','.$room_data['start_date'].','.$room_data['end_date'],
			);
		$validator = Validator::make($room_data, $rules);
		if ($validator->passes())
		{
			$room = Room::find(Input::get('roomnumber'));
			$new_status = status::create(array(
			'status'=>Input::get('status'),
			'room_id'=>Input::get('roomnumber'),
			'start'=>Input::get('start_date'),
			'end'=>Input::get('end_date')
			));

			return Redirect::to('hotel/'.$hotel_id)->with('success', 'You have successfully change room status');
		}
		else return Redirect::back()->withErrors($validator)->withInput();
	}
	public function getDeleteRoomstatus($status_id){
	$status = Status::find($status_id);
	$status->delete();
	return Redirect::back();
	}
}