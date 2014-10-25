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
}
