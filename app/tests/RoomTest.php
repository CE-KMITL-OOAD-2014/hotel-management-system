<?php

class RoomTest extends TestCase {

	public function testRoomStatus()
	{
		///Manager login
		Auth::loginUsingId(1);

		$status_occupied = array(
			'roomnumber' => '1',
			'status' => 'Occupied',
			'start_date' => '2014-11-25',
			'end_date' => '2014-11-27'
			);
		$this->call('POST', '/change_room_status/1', $status_occupied);
		$this->assertRedirectedTo('/hotel/1');
		$this->assertSessionHas('success');
		
		$status_maintenance = array(
			'roomnumber' => '1',
			'status' => 'Maintenance',
			'start_date' => '2014-11-25',
			'end_date' => '2014-11-27'
			);
		///This should get us an error becuase we assign mutiple status
		///to single room with same date
		$this->call('POST', '/change_room_status/1', $status_maintenance);
		$this->assertSessionHasErrors('start_date','end_date');

	}
}