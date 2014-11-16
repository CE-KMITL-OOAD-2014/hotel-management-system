<?php

class HotelTest extends TestCase {

	public function testCreateHotel()
	{


		//create new member and login
		$userdata = (array(
			'name'=>'testName',
			'lastname' => 'testLastName',
			'username' => 'testUsername',
			'password' => 'testPassword',
			'email' => 'test@email.com',
			'role' => 'member',
			));
		$this -> action('POST','AuthController@postRegister',$userdata);
		
		// provide post input
		$hoteldata = array(
            'name' => 'testHotelName',
            'address' => 'testHotelAddress',
            'tel' => '000000000',
			);

			$response = $this->action('POST', 'HotelController@postCreateHotel', $hoteldata);
			// if success user should be redirected to myhotel
			$this->assertRedirectedTo('hotel');

			$hotel = Hotel::find(DB::table('hotels')->max('id'));
			// New hotel's name should be 'testHotelName'
			$this->assertEquals('testHotelName',$hotel->name);
			// New hotel's address should be 'testHotelAddress'
			$this->assertEquals('testHotelAddress',$hotel->address);
			// New hotel's telephone number should be '000000000'
			$this->assertEquals('000000000',$hotel->tel);
	}


	public function testCreateHotelWithDuplicateData(){

		//create new member and login
		$userdata = (array(
			'name'=>'testName',
			'lastname' => 'testLastName',
			'username' => 'testUsername',
			'password' => 'testPassword',
			'email' => 'test@email.com',
			));
		$this -> action('POST','AuthController@postRegister',$userdata);
		

			$hoteldata = array(
            'name' => 'testHotelName',
            'address' => 'testHotelAddress',
            'tel' => '000000000',
			);
			//create first hotel
			$this->action('POST', 'HotelController@postCreateHotel', $hoteldata);
			//create second hotel with first hotel's data
			$response = $this->action('POST', 'HotelController@postCreateHotel', $hoteldata);
			//User should be redirected to 'create_hotel' to fill form again
			$this->assertRedirectedTo('create_hotel');
			$this->assertHasOldInput();
			
	}
}