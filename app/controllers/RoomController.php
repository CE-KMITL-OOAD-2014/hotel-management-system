<?php

class RoomController extends BaseController {

	public function showRoom()
	{
		$user=User::find(Auth::id());
		//only manager can create room
		if( Authority::getCurrentUser()->hasRole('manager') )
		{	
			return View::make('room.room')
			->with('rooms',room::all())
			->with('hotels',hotel::all());
		}
		else if($user->permissions->view_room==1)
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
		if( Authority::getCurrentUser()->hasRole('manager') )
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
		if( Authority::getCurrentUser()->hasRole('manager') )
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
			'price' =>  'Required',
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

            //Set new_room status to empty(1)
			$new_room->statusrooms()->attach(1);

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
		if( Authority::getCurrentUser()->hasRole('manager') )
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
			'price' =>  'Required',
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
		if( Authority::getCurrentUser()->hasRole('manager') )
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

	public function getRoomJson($hotel_id){
		$hotels=Hotel::find($hotel_id);
		$event=array();

		foreach ($hotels->rooms as $room) {
			if($room->checkin!=NULL&&$room->checkout!=NULL){
				array_push($event,room::find($room->id,array('roomnumber as title','checkin as start','checkout as end', )));
			}
		}
		return $event;
	}
		   /////This function will display form to change room status
	public function showChangeRoomstatus($hotel_id){
		////populate drop down menu ($roochoice) with empty room of current hotel
		$hotel = Hotel::find($hotel_id);
		$room_choice =array('' => 'Please select room number');

		foreach ($hotel->rooms as $room) {
			foreach ($room->statusrooms as $status) {
				if($status->name == 'Empty'){
					$room_choice[$room->id] = $room->roomnumber;
				}
			}
		}
		$status_choice = array('' =>'Please select room status') + Statusroom::where('name','!=','Empty')->lists('name','id');

		return View::make('room.change_room_status',array('hotel_id'=>$hotel_id,'rooms'=>$room_choice,'status'=>$status_choice));
	}

	/////This function will change room status from empty to Occupied, Reserved or Maintenance according to form
	public function postChangeRoomstatus($hotel_id){
		$room_data = array(
			'roomnumber' => Input::get('roomnumber'),
			'status' => Input::get('status'),
			'start_date' => Input::get('start_date'),
			'end_date' => Input::get('end_date')
			);
		$rules = array(
			'roomnumber' => 'Required',
			'status' => 'Required',
			///can't set start date in the past
			'start_date' => 'Required|after:'.date('o-m-d',strtotime("-1 days")),
			///End date must come after start_date
			'end_date' => 'Required|after:'.Input::get('start_date')
			);
		$validator = Validator::make($room_data, $rules);
		if ($validator->passes())
		{
			$room = Room::find(Input::get('roomnumber'));
			$room->checkin = Input::get('start_date');
			$room->checkout = Input::get('end_date');
			$room->statusrooms()->detach('1');
			switch (Input::get('status')) {
					//Occupied 
				case '2':
				$room->statusrooms()->attach('2');
				break;
					//Reserved 	
				case '3':
				$room->statusrooms()->attach('3');
				break;
					//Maintenance
				case '4':
				$room->statusrooms()->attach('4');
				break;
				default:
					// do nothing
				break;
			}
			$room->save();
			return Redirect::to('hotel/'.$hotel_id)->with('success', 'You have successfully change room status');
		}
		else return Redirect::back()->withErrors($validator)->withInput();
	}
}