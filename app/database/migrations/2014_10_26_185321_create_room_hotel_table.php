<?php

use Illuminate\Database\Migrations\Migration;

class CreateRoomHotelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_hotel', function($table)
		{
			$table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->integer('room_id')->unsigned();
	
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('room_hotel');
	}

}
