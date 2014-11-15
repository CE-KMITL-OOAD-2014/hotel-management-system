<?php

class PermissionTest extends TestCase {

	public function testPermission()
	{
		///member login
		Auth::loginUsingId(2);
		///attmept to join hotel id 1
		$response = $this->call('GET', '/join_hotel/1');
		/// Member should be redirected to 'hotel' with success message after send join request
		$this->assertRedirectedTo('hotel');
		$this->assertSessionHas('success');
		///member logout
		Auth::logout();

		///Manager login
		Auth::loginUsingId(1);
		///accept user_id 2 to hotel_id 1
		$this->call('GET', '/accept/1/2');
		///Manager should be redirected to set user_id 2 permission
		$this->assertRedirectedTo('/permission/1/2');

		///Set permission to not allowed anything
		// provide post input
		$permission = array(
			'room' => 'no_room',
			'guest' => 'no_guest',
			);
		$this->call('POST', '/permission/1/2', $permission);
		$this->assertRedirectedTo('staff');
		$this->assertSessionHas('success');
		///Manager logout
		Auth::logout();

		///User id 2 login
		Auth::loginUsingId(2);

		///try to look at guests
		$this->call('GET', '/guest');

		///User without permission should be redirected to home with fail message
		$this->assertRedirectedTo('');
		$this->assertSessionHas('fail');

		///try to look at guests
		$this->call('GET', '/room');

		///User without permission should be redirected to home with fail message
		$this->assertRedirectedTo('');
		$this->assertSessionHas('fail');

		///User id 2 logout
		Auth::logout();


		///Manager login
		Auth::loginUsingId(1);

		///Allow user 2 to view room&guest
		$permission = array(
			'room' => 'view_room',
			'guest' => 'view_guest',
			);
		$this->call('POST', '/edit_permission/1/2', $permission);
		///Manager logout
		Auth::logout();

		///User id 2 login
		Auth::loginUsingId(2);

		///try to look at guests
		$this->call('GET', '/guest');

		///User 2 shoud be able to look at guest now
		$this->assertResponseOk();
		$this->assertViewHas('guests');

		///try to look at guests
		$this->call('GET', '/room');

		///User shoud be able to look at room now
		$this->assertResponseOk();
		$this->assertViewHas('rooms');

		///User id 2 logout
		Auth::logout();

		///Manager login
		Auth::loginUsingId(1);

		///Allow user 2 to view room&guest
		$permission = array(
			'room' => 'manage_room',
			'guest' => 'manage_guest',
			);
		$this->call('POST', '/edit_permission/1/2', $permission);
		///Manager logout
		Auth::logout();

		///User id 2 login
		Auth::loginUsingId(2);

		///user should be able to create new room status
		$status = array(
			'roomnumber' => '1',
			'status' => 'Occupied',
			'start_date' => '2014-11-25',
			'end_date' => '2014-11-27'
			);
		$this->call('POST', '/change_room_status/1',$status);
		$status = Status::find(DB::table('statuses')->max('id'));
		$this->assertEquals('1',$status->room_id);
		$this->assertEquals('Occupied',$status->status);
		$this->assertEquals('2014-11-25',$status->start);
		$this->assertEquals('2014-11-27',$status->end);

		///User should be able to delete room status
		$this->call('GET', '/hotel/delete_room_status/1');
		$this->assertResponseStatus(302);

		$guest = array(
		'gender' => 'Male',
        'nationality' => 'Th',
        'name' => 'guesttest',
        'lastname' => 'guesttest',
        'dateOfBirth' => '1994-11-09',
        'address' => 'guest_test',
        'tel' => '01234567',
        'passportNo' => '111a1111',
        'citizenCardNo' => '10000001',);
		///User should be able to create guest now
		$this->call('POST', '/create_guest/1',$guest);
		$this->assertRedirectedTo('guest');
		$this->assertSessionHas('success');
	}
}