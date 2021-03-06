<?php

class HotelController extends BaseController {

	public function index(){
		return Hotel::all(array('name as name','address as adddress','tel as telephoneNumber'));
	}
	public function showHotel()
	{

		return View::make('hotel.hotel')
		->with ('hotels',hotel::all());
	}


	public function showCreateHotel()
	{
    	//staff can't create hotel
		if( Auth::user() != 'staff' ) 
			return View::make('hotel.create_hotel');
		//something went wrong
		else
			return Redirect::to('')->with('fail', 'access deny' );
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
			'tel' =>  'Required|numeric|unique:hotels',

			);
		$validator = Validator::make($userdata, $rules);
		if ($validator->passes())
		{
			$user = Auth::user();
        	// Create hotel in database
			$new_hotel =  hotel::create($userdata);

        	//Change role member to manager
			if( $user->role == 'member'){
				$user = Auth::user();
				$user->role = 'manager';
				$user->save();
			}

        //Attatch current user to newly created hotel

			$user->hotels()->attach($new_hotel);

        //Remove request this user all hotel
			foreach( $user->requestHotels as $hotels){
				$user->requestHotels()->detach($hotels->id);
			}
        //Redirect to home with success message
			return Redirect::to('hotel')->with('success', 'You have successfully create hotel');
		}
		// Something went wrong.
		else
			return Redirect::to('create_hotel')->withErrors($validator)->withInput();
	}


	public function joinHotel($hotel_id)
	{ 
		$user = Auth::user();
		$hotel = hotel::find($hotel_id);
        //check only member can join hotel 
		if( $user->role == 'member' ){
        //check this user have duplicate join : not create request
			foreach( $user->requestHotels as $hotels){
				foreach($hotel->requestUsers as $users){
					if($hotels->id==$hotel_id&&$users->id==$user->id)
						return Redirect::to('hotel')->with('success', 'You have successfully request to join hotel');
				}
			}
        //create request to hotel
			$user->requestHotels()->attach($hotel);
			return Redirect::to('hotel')->with('success', 'You have successfully request to join hotel');
		}
		//Something went wrong.
		else
			return Redirect::to('')->with('fail', 'access deny' );
	}

	public function showEditHotel($hotel_id)
	{
    //check only manager can edit hotel
		if( Auth::user()->role == 'manager' ){
			return View::make('hotel.edit_hotel')   
			->with('hotel',hotel::find($hotel_id));
		}
		else
			return Redirect::to('')->with('fail', 'access deny' );
	}
	public function postEditHotel($hotel_id)
	{
		$hotel = hotel::find($hotel_id);
		$hotel->name = Input::get('name');

		$userdata = array(
			'name' => Input::get('name'),
			'address' => Input::get('address'),
			'tel' => Input::get('tel'),
			);
		$rules = array(
			'name' => 'Required',
        //address and telephone number can't duplicate except them self
			'address' =>  'Required|unique:hotels,address,'.$hotel_id,
			'tel' =>  'Required|numeric|unique:hotels,tel,'.$hotel_id,

			);
		$validator = Validator::make($userdata, $rules);
		if ($validator->passes())
		{
        //replace old data with input
			$hotel->address = Input::get('address');
			$hotel->tel = Input::get('tel');
			$hotel->save();
			return Redirect::to('hotel')->with('success', 'You have successfully edit '.$hotel->name.' hotel.');
		}
    //Something went wrong
		else 
			return Redirect::to('edit_hotel/'.$hotel_id)->withErrors($validator)->withInput();
	}
	public function deleteHotel($hotel_id){

		$user=Auth::user();
		$hotel=Hotel::find($hotel_id);
		if( $user->role =='manager' )
		{
        //delete all guest in hotel
			foreach($hotel->guests as $guest){
				App::make('GuestController')->deleteGuest($hotel_id,$guest->id);
			}
        //delete all request user in hotel
			foreach($hotel->requestUsers as $request){
				App::make('StaffController')->staffDecline($hotel_id,$request->id);
			}
        //delete all room in hotel
			foreach($hotel->rooms as $room){
				App::make('RoomController')->deleteRoom($hotel_id,$room->id);
			}
        //fire all staff in hotel
			foreach($hotel->users as $staff){
				if($staff->role == 'staff' )
					App::make('StaffController')->fireStaff($hotel_id,$staff->id);
			}
        //delete hotel
			$hotel->delete();

        // check if manager still have hotel left
			$countHotel = 0;
			foreach($user->hotels as $hotel ){
				$countHotel++;
			}
        // if manager have no hotel left the change role to member
			if($countHotel==0)
			{
				$user->role ='member';
				$user->save();
			}
			return Redirect::to('hotel')->with('success', 'You have successfully edit '.$hotel->name.' hotel.');
		}
 		//Something went wrong
		else
			return Redirect::to('')->with('fail', 'access deny' );
	}
}